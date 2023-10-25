<?php

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_dbname = "furniture";
$conn = "";

try {
    $conn = mysqli_connect($db_server ,$db_user,$db_password,$db_dbname);

} catch(mysqli_sql_exception) {
    echo "Could not connect to Database";
}