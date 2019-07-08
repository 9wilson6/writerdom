<?php 
	function students(){
		global $db, $students;
		$query="SELECT * FROM users WHERE type=1";
		$results=$db->get_results($query);
		$students= $db->num_rows;
	}
	students();
 ?>