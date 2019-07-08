<?php 
	function closed(){
		global $db, $closed;
		$query="SELECT * FROM closed";
		$results=$db->get_results($query);
		 $closed= $db->num_rows;
	}
closed();
 ?>