<?php

require 'dbh.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Chat Easy Integration</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery2.js"></script>
</head>

<body>

</body>

</html>