<?php 

	function available(){
		global $db, $available;
		$query="SELECT * FROM projects WHERE status=0";
		$results=$db->get_results($query);
		 $available= $db->num_rows;
	}
available();
 ?>