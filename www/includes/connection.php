<?php

function run_query($strQuery, $scrollable = array( "Scrollable" => SQLSRV_CURSOR_KEYSET ))  {

	$connection;

  if ( !isset($_SESSION["connection"]) || $_SESSION["connection"] == false ) {
		$connection = open_connection();
	}
	else {
		$connection = $_SESSION["connection"];
	}

	$result = sqlsrv_query($connection, $strQuery, array(), $scrollable);
	if( $result === false ) {
	    if( ($errors = sqlsrv_errors() ) != null) {
	        foreach( $errors as $error ) {
	            echo "QUERY: ".$strQuery."<br />";
	            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
	            echo "code: ".$error[ 'code']."<br />";
	            echo "message: ".$error[ 'message']."<br />";
	        }
	    }
	}
	return $result;
}


function open_connection() {

	$connection;

	$myServer = ".\sqlexpress";
	$myUser = "sa";
	$myPass = "fjlk3232!qrADFFDS";
	$myBD = "php-reports";

	$connectionInfo = array( "UID"=>$myUser,
		                       "PWD"=>$myPass,
		                       "Database"=>$myBD,
													 "ReturnDatesAsStrings"=>true  //<-- This is the important line
												 );

	$connection = sqlsrv_connect( $myServer, $connectionInfo);

	if ( $connection === false ) {
		echo "connection error!";
		return 'ERROR';
	}
	else {
		$_SESSION["connection"] = $connection;
		return $connection;
	}

}

?>
