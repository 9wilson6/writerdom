<?php 

	function revision(){
		global $db, $revision;
		$query="SELECT * FROM revisions";
		$results=$db->get_results($query);
		$revision= $db->num_rows;
	}
	revision();
 ?>