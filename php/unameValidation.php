<?php

require '../dbh.php';

if (isset($_POST['username'])) {
    $uname = mysqli_real_escape_string($conn, trim($_POST['username']));
}

if (empty($uname)) {
    echo "Enter a username &times;";
    exit();
}

if (strlen($uname) < 5) {
    echo "Username must be longer 5 characters &times;";
    exit();
}

$sql = "SELECT * FROM users WHERE username = '$uname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "$uname already exists &times;";
    exit();
} else {
    echo "$uname &check;";
}