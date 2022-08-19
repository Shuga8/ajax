<?php

require '../dbh.php';

if (isset($_POST['password']) && isset($_POST['confirmPassword'])) {

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPass = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
}

$passwordFormat = "/^[A-Za-z].*[0-9].*/";

if (empty($password)) {
    echo "enter password first";
    exit();
}

if (empty($confirmPass)) {
    echo "please re-enter password";
    exit();
}

if (empty($password)) {
    echo "enter a password";
    exit();
}

if (strlen($password) < 8) {
    echo "password must be at least 8 characters";
    exit();
}

if (!preg_match($passwordFormat, $password)) {
    echo "not strong enough must contain numbers upper and lower case numbers";
    exit();
}

if ($confirmPass != $password) {
    echo "passwords do not match &times;";
    exit();
} else {
    echo "password &check;";
}