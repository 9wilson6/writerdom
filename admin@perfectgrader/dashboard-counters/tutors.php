<?php 

	function tutors(){
		global $db, $tutors;
		$query="SELECT * FROM users WHERE type=2";
		$results=$db->get_results($query);
		$tutors= $db->num_rows;
	}
	tutors();
 ?>