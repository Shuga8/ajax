<?php

session_start();

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ajax";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);