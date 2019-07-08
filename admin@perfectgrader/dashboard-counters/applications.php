<?php 
	function applications(){
		global $db, $applications;
		$query="SELECT * FROM users WHERE type=2 and verified=0 and about_me !=\"\"";
		$results=$db->get_results($query);
		$applications= $db->num_rows;
			}
applications();
 ?>