<?php 
	function delivered(){
		global $db, $delivered;
		$query="SELECT * FROM delivered";
		$results=$db->get_results($query);
		$delivered = $db->num_rows;
	}
delivered();
 ?>