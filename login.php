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

<script>
$(document).ready(function() {

    $("#login-btn").click(function(event) {
        event.preventDefault()

        let usernameEmail = $("#unameEmail").val()
        let pass = $("#pwd").val()
        let loginBtn = $("#login-btn").val()

        $.post('php/login.php', {
            unameEmail: usernameEmail,
            pwd: pass,
            login: loginBtn

        }, function(data, status) {
            if (data == "Login successfull, proceeding to home page") {
                alert(data)
                location.href = "index.php"
            }

            if (data == "Fill in all fields &times;") {
                $("#unameEmail").removeClass("input-valid")
                $(".unameEmailMessage").removeClass("success-message")
                $("#unameEmail").addClass("input-error")
                $("#pwd").addClass("input-error")
                $(".unameEmailMessage").addClass("error-message")

                $(".error-field").html(data)
                $(".error-field").addClass("error-message")
            }

            if (data == "Incorrect password &times;") {

                $("#pwd").addClass("input-error")
                $(".passwordMessage").html(data)
                $(".error-field").addClass("error-message")
                $(".passwordMessage").addClass("error-message")
            }

            if (data.includes("does not exist &times;")) {

                $("#unameEmail").removeClass("input-valid")
                $(".unameEmailMessage").removeClass("success-message")
                $("#unameEmail").addClass("input-error")
                $(".unameEmailMessage").addClass("error-message")

                $(".error-field").html(data)
                $(".error-field").addClass("error-message")
            }
        })
    })

    $("#unameEmail").keyup(function() {
        let usernameEmail = $("#unameEmail").val()

        $.post('php/username.php', {
            unameEmail: usernameEmail
        }, function(data, status) {

            if (data.includes("&check;")) {
                $("#unameEmail").removeClass("input-error")
                $(".unameEmailMessage").removeClass("error-message")
                $("#unameEmail").addClass("input-valid")
                $(".unameEmailMessage").addClass("success-message")
            } else {
                $("#unameEmail").removeClass("input-valid")
                $(".unameEmailMessage").removeClass("success-message")
                $("#unameEmail").addClass("input-error")
                $(".unameEmailMessage").addClass("error-message")
            }

            $(".unameEmailMessage").html(data)

        })
    })



})
</script>

<body>
    <section id="login-container">

        <h1>Login</h1>

        <form action="php/login.php" method="POST" id="login-form">

            <p class="error-field"></p>

            <p class="unameEmailMessage"></p>
            <input type="text" name="unameEmail" placeholder="Username or Email" id="unameEmail"
                title="username or email">

            <p class="passwordMessage"></p>
            <input type="password" name="pwd" placeholder="Password" id="pwd" title="password">

            <div class="show-hide-pass">
                <input type="checkbox" id="show" title="show password"><span for="show">show password</span>
            </div>

            <button id="login-btn" name="login" title="login">LOGIN</button>

            <p class="link">Not registered yet? <a href="register.php">register </a>here</p>

        </form>
    </section>

    <script src="js/show-hide-pass.js"></script>
</body>

</html>