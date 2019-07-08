<?php 
function progress(){
		global $db, $progress;
		$query="SELECT * FROM on_progress";
		$results=$db->get_results($query);
		$progress= $db->num_rows;
	}
	progress();
 ?>