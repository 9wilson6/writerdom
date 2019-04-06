   <?php 
   ob_start();
   require_once("../dbconfig/dbconnect.php");
   $query="SELECT * FROM users WHERE dues>0";
   $results=$db->get_results($query);
   date_default_timezone_set("Africa/Nairobi");
$date_global=date('Y-m-d H:i:s');
   $output='<table border="1">
    <caption> payments for date '.$date_global.'(local time)</caption>
    <thead>
        <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Dues</th>
        </tr>
    </thead><tbody>';
    if ($db->num_rows==0) {
        $output.='<tr>
        <td>N/A</td>
        <td>N/A</td>
        <td>N/A</td>
        <td>N/A</td>
        </tr>';
    }else{
       foreach ($results as $result) {
        $output.='<tr>
        <td>'.$result->user_id.'</td>
        <td>'.$result->username.'</td>
        <td>'.$result->email.'</td>
        <td>$'.$result->dues.'</td>
        </tr>';
    }  
    }
    
    $output.='</tbody></table>';
    $query="UPDATE users SET  dues=0 ";

        $db->query($query);

       $query="UPDATE projects SET status=5, DATE_PAID='$date_global' WHERE status=4";
       $db->query($query);

         $date=strtotime("+7days");

    $query="UPDATE others SET payment_date='$date'";
    if ($db->query($query)) {
        header("Content-Disposition: attachment; filename=wilson.xls");
        header("Content-Type: application/vnd.ms-excel");
        echo $output;
    }

    ?> 