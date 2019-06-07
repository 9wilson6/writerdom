<?php 
	function suspended(){
		global $db;
		$query="SELECT * FROM users WHERE status=0";
		$results=$db->get_results($query);
		return $db->num_rows;
	}
 ?>