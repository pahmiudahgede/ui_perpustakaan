<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaran_siswa";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

function getConn()
{
    global $conn;
    return $conn;
}
