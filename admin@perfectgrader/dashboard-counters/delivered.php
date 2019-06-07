<?php 
	function delivered(){
		global $db;
		$query="SELECT * FROM delivered";
		$results=$db->get_results($query);
		return $db->num_rows;
	}

 ?>