<?php 
	function closed(){
		global $db;
		$query="SELECT * FROM closed";
		$results=$db->get_results($query);
		return $db->num_rows;
	}

 ?>