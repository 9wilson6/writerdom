<?php 

	function tutors(){
		global $db;
		$query="SELECT * FROM users WHERE type=2";
		$results=$db->get_results($query);
		return $db->num_rows;
	}
 ?>