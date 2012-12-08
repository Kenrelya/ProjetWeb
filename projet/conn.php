<?php
include("header.php");

  include("db_config.php");

  $conn = mysql_connect($DB_host, $DB_login, $DB_pass); 

  $db = mysql_select_db($DB_select, $conn);

  if (!$conn || !$db) die('Could not connect: ' . mysql_error()); 

?>
