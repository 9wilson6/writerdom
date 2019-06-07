<?php 

	function balance(){
		global $db;
		$query="SELECT SUM(cost) AS cost FROM projects WHERE status=4";
		$results=$db->get_row($query);
		return $results->cost;
	}
 ?>