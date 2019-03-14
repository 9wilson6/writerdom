<?php 
require_once(  'config.php');
require_once(  'shared/ez_sql_core.php');
require_once( 'ez_sql_mysqli.php');
$db=new ezSQL_mysqli(DB_USER, DB_PASS,DB_NAME,DB_HOST,DB_ENCODING);
 ?>