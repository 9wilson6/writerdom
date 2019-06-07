<?php 
	function students(){
		global $db;
		$query="SELECT * FROM users WHERE type=1";
		$results=$db->get_results($query);
		return $db->num_rows;
	}
 ?>