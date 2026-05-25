<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "notes_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed");
}
