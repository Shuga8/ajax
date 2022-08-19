<?php

require '../dbh.php';

if (isset($_POST['unameEmail'])) {
    $unameEmail = mysqli_real_escape_string($conn, trim($_POST['unameEmail']));
}

if (empty($unameEmail)) {
    echo "Enter username or email &times;";
    exit();
}

$sql = "SELECT * FROM users WHERE username = '$unameEmail' OR email = '$unameEmail';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "$unameEmail &check;";
    exit();
} else {
    echo "$unameEmail does not exist &times;";
    exit();
}