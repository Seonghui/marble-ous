<?php
$host = "localhost";
$username = "mesuong4444";
$password = "whcldnjs1";
$dbName = "mesuong4444";

// Create connection
$db = new mysqli($host, $username, $password, $dbName);

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
        . $db->connect_error);
}

/*
 * Use this instead of $connect_error if you need to ensure
 * compatibility with PHP versions prior to 5.2.9 and 5.3.0.
 */
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}
?>