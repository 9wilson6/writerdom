<?php 

	function available(){
		global $db;
		$query="SELECT * FROM projects WHERE status=0";
		$results=$db->get_results($query);
		return $db->num_rows;
	}

 ?>