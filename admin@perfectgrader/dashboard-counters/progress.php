<?php 
function progress(){
		global $db;
		$query="SELECT * FROM on_progress";
		$results=$db->get_results($query);
		return $db->num_rows;
	}
 ?>