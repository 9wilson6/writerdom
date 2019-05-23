<?php
require_once("../dbconfig/dbconnect.php");
function display_data(){

global $db; 

$query="SELECT * FROM posts";
$results=$db->get_results($query);

foreach ($results as $result) {
	echo '<img height="300" width="300" src="data:image;base64,'.$result->file.'">';
}

}
display_data();
  ?>