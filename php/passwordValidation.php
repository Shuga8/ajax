<?php


if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$passwordError = false;
$passwordValidationError = false;
$passwordFormat = "/^[A-Za-z].*[0-9].*/";

if (empty($password)) {
    echo "Enter a password";
    exit();
}

if (strlen($password) < 8) {
    echo "Password must be at least 8 characters";
    exit();
}

if (!preg_match($passwordFormat, $password)) {
    echo "Not strong enough must contain numbers upper and lower case numbers";
    exit();
} else {
    echo "Password &check;";
    exit();
}