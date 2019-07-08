<?php 
function dues(){
		global $db, $dues;
		$query="SELECT SUM(dues) AS charges FROM users WHERE type=2";
		$results=$db->get_row($query);
		$dues= $results->charges;
	}
dues();
 ?>