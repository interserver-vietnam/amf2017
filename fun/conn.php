<?php
function openDB(){
    global $conn;
    $servername = "localhost";	

	
	$username = "root";
	$password = "digiorangeFor#AMF";
	$dbname = "amf2017";
	
	// var_dump($servername);

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
    // var_dump($conn->connect_error);
    mysqli_query($conn, "SET NAMES 'utf8'"); 
    mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8"); 
    mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");
}


function closeDB(){
    global $conn;
    return mysqli_close($conn);
}

?> 