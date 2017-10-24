<?php

require_once("../includes/connection.php");

session_start();

$conn = open_connection();
$query = "select 'hi' as column1";

$result = sqlsrv_query($conn, $query,  array());
if( sqlsrv_fetch( $result ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
else {
  echo $result;
}

?>
