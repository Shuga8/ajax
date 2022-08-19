<?php

require '../dbh.php';

if (isset($_POST['login'])) {

    $unameEmail = mysqli_real_escape_string($conn, trim($_POST['unameEmail']));

    $pwd = mysqli_real_escape_string($conn, trim($_POST['pwd']));

    if (empty($unameEmail) || empty($pwd)) {
        echo "Fill in all fields &times;";
        exit();
    }

    $sql = "SELECT * FROM users WHERE username = '$unameEmail' OR email = '$unameEmail';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $verify = password_verify($pwd, $row['password']);

        if ($verify) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            echo "Login successfull, proceeding to home page";
            exit();
        } else {
            echo "Incorrect password &times;";
            exit();
        }
    } else {
        echo "$unameEmail does not exist &times;";
        exit();
    }
}