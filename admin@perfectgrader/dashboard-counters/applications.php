<?php 
	function applications(){
		global $db;
		$query="SELECT * FROM users WHERE type=2 and verified=0 and about_me !=\"\"";
		$results=$db->get_results($query);
		return $db->num_rows;
	}

 ?>