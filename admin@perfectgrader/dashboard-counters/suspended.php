<?php 
	function suspended(){
		global $db, $suspended;
		$query="SELECT * FROM users WHERE status=0";
		$results=$db->get_results($query);
		$suspended= $db->num_rows;
	}
	suspended();
 ?>