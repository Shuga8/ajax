<?php

require '../dbh.php';

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
}

if (empty($email)) {
    echo "Enter an email &times;";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "$email is invalid &times";
    exit();
}

$sql = "SELECT * FROM users WHERE email = '$email';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "$email already exists &times;";
    exit();
} else {
    echo "$email &check;";
    exit();
}