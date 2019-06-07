<?php 
function dues(){
		global $db;
		$query="SELECT SUM(dues) AS charges FROM users WHERE type=2";
		$results=$db->get_row($query);
		return $results->charges;
	}

 ?>