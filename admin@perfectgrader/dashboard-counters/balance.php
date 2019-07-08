<?php 

	function balance(){
		global $db, $balance;
		$query="SELECT SUM(cost) AS cost FROM projects WHERE status=4";
		$results=$db->get_row($query);
		 $balance= $results->cost;
	}
	balance();
 ?>