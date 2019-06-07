<?php 

	function revision(){
		global $db;
		$query="SELECT * FROM revisions";
		$results=$db->get_results($query);
		return $db->num_rows;
	}
 ?>