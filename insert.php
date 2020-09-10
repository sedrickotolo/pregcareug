<?php

$username = "root";
$password = "";
$database = "pregcare";

$mysqli = new mysqli("localhost", $username, $password, $database);

// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.

$field1 = $mysqli->real_escape_string($_POST['field1']);
$field2 = $mysqli->real_escape_string($_POST['field2']);

$query = "INSERT INTO sample (col1, col2)
            VALUES ('{$field1}','{$field2}')";

$mysqli->query($query);
$mysqli->close();

?>