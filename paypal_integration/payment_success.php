<?php
session_start();
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'bootstrap.php';
require_once("../inc/utilities.php");
require_once("../dbconfig/dbconnect.php");
if (empty($_GET['paymentId']) || empty($_GET['PayerID'])) {
    throw new Exception('The response is missing the paymentId and PayerID');
}
$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);
$execution = new PaymentExecution();
$execution->setPayerId($_GET['PayerID']);
try {
    // Take the payment
    $payment->execute($execution, $apiContext);
    try {
        // $db = new mysqli($dbConfig['host'], $dbConfig['root'], $dbConfig['password'], $dbConfig['name']);
        $payment = Payment::get($paymentId, $apiContext);
        $data = [
            'transaction_id' => $payment->getId(),
            'payment_amount' => $payment->transactions[0]->amount->total,
            'payment_status' => $payment->getState(),
            'invoice_id' => $payment->transactions[0]->invoice_number
        ];
        if (addPayment($data) !== false && $data['payment_status'] === 'approved') {
            // Payment successfully added, redirect to the payment complete page.
            header('location:payment-successful.html');
            exit(1);
        } else {
            // Payment failed
        }
    } catch (Exception $e) {
        // Failed to retrieve payment from PayPal
    }
} catch (Exception $e) {
    // Failed to take payment
}
/**
 * Add payment to database
 *
 * @param array $data Payment data
 * @return int|bool ID of new payment or false if failed
 */
function addPayment($data)
{
    global $db;
    if (is_array($data)) {
    $transaction_id=  $data['transaction_id'];
        $payment_amount=  $data['payment_amount'];
        $payment_status=  $data['payment_status'];
          $invoice_id=$data['invoice_id'];
        $date=  date('Y-m-d H:i:s');
        $project_id=$_SESSION['project_id'];
      $query="INSERT INTO paypal_payments(item_no, transaction_id, payment_amount, payment_status,invoice_id, createdtime ) VALUES('$project_id','$transaction_id', '$payment_amount','$payment_status',  '$invoice_id','$date')";
        $db->query($query);
    }
    return false;
}
?>
<html>
<head>
<title>PayPal Integration - Payment Completed Successfully</title>
</head>
<body>
<h1><?php   
             $project_id=$_SESSION['project_id'];
             $user_id=$_SESSION['user_id'];
             $tutor_id= $_SESSION['tutor_id'];
             $cost= $_SESSION['cost'];
             $charges=  $_SESSION['charges'];
    $query="INSERT INTO on_progress(project_id, student_id, tutor_id) VALUES ('$project_id', '$user_id', '$tutor_id')";
if ($db->query($query)) {
    $query="UPDATE projects SET status=1, cost=$cost, charges=$charges WHERE project_id='$project_id'";
    if ($db->query($query)) {

        $query="DELETE FROM bids WHERE project_id='$project_id'";
        if ($db->query($query)) {
             /////////////////////////////////notification/////////////////////////////////////////////
    $note="Student Id: ".$user_id." assigned project id: ".$project_id." to Tutor id:".$tutor_id." at ".$date_global;
    $note2="You Assigned project id: ".$project_id." to Tutor id:".$tutor_id." at ". $date_global;
    $user_type=$_SESSION['user_type'];
    $querys="INSERT INTO notifications(user_type, note) VALUES('$user_type','$note')";
    $db->query($querys);
    $querys="INSERT INTO notifications(user_type, note, user_id) VALUES(3,'$note2','$user_id')";
    $db->query($querys);
      /////////////////////////////////notification/////////////////////////////////////////////
            unset($_SESSION['project_id']);
            // unset($_SESSION['user_id']);
            unset($_SESSION['tutor_id']);
            unset($_SESSION['charges']);
            unset($_SESSION['user_type_pass']);
            ?>
        <script>
            let x="<?php echo $tutor_id ?>"
            alert(" Payment Completed Successfully....\n Project successfully assigned to tutor id: " +x );
              window.location.assign("../student/in-progress");
        </script>
    <?php
        }
     }
}
 ?></h1>
</body>
</html>
