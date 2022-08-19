<?php

require '../dbh.php';

if (isset($_POST['register'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $ConfirmPass = mysqli_real_escape_string($conn, $_POST['c_pwd']);
    $errorEmpty = false;
    $errorEmail = false;
    $errorPasswordLength  = false;
    $errorPasswordMatch = false;
    $errorPasswordValidation = false;
    $passwordFormat = "/^[A-Za-z].*[0-9].*/";

    if (empty($uname) || empty($email) || empty($pwd) || empty($ConfirmPass)) {
        echo "Fill in all fields &times;";
        $errorEmpty = true;
        exit();
    }

    $sql = "SELECT * FROM users WHERE username = '$uname';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "$uname is taken &times;";
        exit();
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address &times;";
        $errorEmail = true;
        exit();
    }

    $sql = "SELECT * FROM users WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "$email already exists &times;";
        exit();
    }

    if (strlen($pwd) < 8) {
        echo "Password must be at least 8 characters &times;";
        $errorPasswordLength = true;
        exit();
    }

    if (!preg_match($passwordFormat, $pwd)) {
        echo "Not strong enough must contain numbers upper and lower case letters and end with numbers &times;";
        $errorPasswordValidation = true;
        exit();
    }

    if ($pwd != $ConfirmPass) {
        echo "Passwords do not match &times;";
        $errorPasswordMatch = true;
        exit();
    }

    if ($errorEmail == false && $errorEmail == false && $errorPasswordLength == false && $errorPasswordValidation == false && $errorPasswordMatch == false) {

        $hashedPass = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES('$uname', '$email', '$hashedPass');";
        $result = mysqli_query($conn, $sql);

        if ($result == TRUE) {

            echo "Registration successfull, proceed to login";
            exit();
        } else {
            echo "An error occured &times;";
            exit();
        }
    } else {
        echo "An error occured &times;";
        exit();
    }
}