<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Chat Easy Integration</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery2.js"></script>

    <script>
    $(document).ready(function() {
        $("#register-btn").click(function(event) {
            event.preventDefault()
        })

        $("#uname").keyup(function() {
            let uname = $("#uname").val()

            $.post('php/unameValidation.php', {
                username: uname
            }, function(data, status) {

                if (data.includes("Enter a username")) {
                    $('.unameMessage').removeClass('success-message')
                    $('#uname').removeClass('input-valid')
                    $('#uname').addClass('input-error')
                    $('.unameMessage').addClass('error-message')
                }

                if (data.includes("Username must be longer 5 characters")) {
                    $('.unameMessage').removeClass('success-message')
                    $('#uname').removeClass('input-valid')
                    $('#uname').addClass('input-error')
                    $('.unameMessage').addClass('error-message')
                }

                if (data.includes("already exists")) {
                    $('.unameMessage').removeClass('success-message')
                    $('#uname').removeClass('input-valid')
                    $('#uname').addClass('input-error')
                    $('.unameMessage').addClass('error-message')
                }

                if (data.includes("&check;")) {
                    $('.unameMessage').removeClass('error-message')
                    $('#uname').removeClass('input-error')
                    $('#uname').addClass('input-valid')
                    $('.unameMessage').addClass('success-message')
                }

                $(".unameMessage").html(data)
            })
        })

        $("#email").keyup(function() {
            let mail = $("#email").val()

            $.post('php/emailValidation.php', {
                email: mail
            }, function(data, status) {

                if (data.includes("Enter an email")) {
                    $('.emailMessage').removeClass('success-message')
                    $('#email').removeClass('input-valid')
                    $('#email').addClass('input-error')
                    $('.emailMessage').addClass('error-message')
                }

                if (data.includes(" is invalid")) {
                    $('.emailMessage').removeClass('success-message')
                    $('#email').removeClass('input-valid')
                    $('#email').addClass('input-error')
                    $('.emailMessage').addClass('error-message')
                }

                if (data.includes("already exists")) {
                    $('.emailMessage').removeClass('success-message')
                    $('#email').removeClass('input-valid')
                    $('#email').addClass('input-error')
                    $('.emailMessage').addClass('error-message')
                }


                if (data.includes("&check;")) {
                    $('.emailMessage').removeClass('error-message')
                    $('#email').removeClass('input-error')
                    $('#email').addClass('input-valid')
                    $('.emailMessage').addClass('success-message')
                }

                $(".emailMessage").html(data)
            })
        })

        $("#pwd").keyup(function() {
            let pwd = $("#pwd").val()

            $.post('php/passwordValidation.php', {
                password: pwd
            }, function(data, success) {

                if (data == "Enter a password") {
                    $('.passwordMessage').removeClass('success-message')
                    $('#pwd').removeClass('input-valid')
                    $('#pwd').addClass('input-error')
                    $('.passwordMessage').addClass('error-message')
                }

                if (data == "Password must be at least 8 characters") {
                    $('.passwordMessage').removeClass('success-message')
                    $('#pwd').removeClass('input-valid')
                    $('#pwd').addClass('input-error')
                    $('.passwordMessage').addClass('error-message')
                }

                if (data ==
                    "Not strong enough must contain numbers upper and lower case numbers") {
                    $('.passwordMessage').removeClass('success-message')
                    $('#pwd').removeClass('input-valid')
                    $('#pwd').addClass('input-error')
                    $('.passwordMessage').addClass('error-message')
                }

                if (data == "Password &check;") {
                    $('.passwordMessage').removeClass('error-message')
                    $('#pwd').removeClass('input-error')
                    $('#pwd').addClass('input-valid')
                    $('.passwordMessage').addClass('success-message')
                }

                $(".passwordMessage").html(data)
            })
        })

        $("#c-pwd").keyup(function() {
            let pwd = $("#pwd").val()
            let confirmPwd = $("#c-pwd").val()

            $.post('php/confirmPassword.php', {
                password: pwd,
                confirmPassword: confirmPwd
            }, function(data, status) {

                if (data == "enter password first") {
                    $('.confirmPasswordMessage').removeClass('success-message')
                    $('#c-pwd').removeClass('input-valid')
                    $('#c-pwd').addClass('input-error')
                    $('.confirmPasswordMessage').addClass('error-message')
                }

                if (data == "please re-enter password") {
                    $('.confirmPasswordMessage').removeClass('success-message')
                    $('#c-pwd').removeClass('input-valid')
                    $('#c-pwd').addClass('input-error')
                    $('.confirmPasswordMessage').addClass('error-message')
                }

                if (data == "enter a password") {
                    $('.confirmPasswordMessage').removeClass('success-message')
                    $('#c-pwd').removeClass('input-valid')
                    $('#c-pwd').addClass('input-error')
                    $('.confirmPasswordMessage').addClass('error-message')
                }

                if (data == "password must be at least 8 characters") {
                    $('.confirmPasswordMessage').removeClass('success-message')
                    $('#c-pwd').removeClass('input-valid')
                    $('#c-pwd').addClass('input-error')
                    $('.confirmPasswordMessage').addClass('error-message')
                }

                if (data ==
                    "not strong enough must contain numbers upper and lower case numbers") {
                    $('.confirmPasswordMessage').removeClass('success-message')
                    $('#c-pwd').removeClass('input-valid')
                    $('#c-pwd').addClass('input-error')
                    $('.confirmPasswordMessage').addClass('error-message')
                }

                if (data == "passwords do not match &times;") {
                    $('.confirmPasswordMessage').removeClass('success-message')
                    $('#c-pwd').removeClass('input-valid')
                    $('#c-pwd').addClass('input-error')
                    $('.confirmPasswordMessage').addClass('error-message')
                }

                if (data == "password &check;") {
                    $('.confirmPasswordMessage').removeClass('error-message')
                    $('#c-pwd').removeClass('input-error')
                    $('#c-pwd').addClass('input-valid')
                    $('.confirmPasswordMessage').addClass('success-message')
                }

                $('.confirmPasswordMessage').html(data)

            })
        })

        $("#register-btn").click(function() {
            let username = $("#uname").val()
            let mail = $("#email").val()
            let pass = $("#pwd").val()
            let confirmPass = $("#c-pwd").val()
            let registerButton = $("#register-btn").val()

            $.post("php/register.php", {
                uname: username,
                email: mail,
                pwd: pass,
                c_pwd: confirmPass,
                register: registerButton
            }, function(data, status) {

                if (data == "Fill in all fields &times;") {
                    $('#uname').addClass('input-error')
                    $('#email').addClass('input-error')
                    $('#pwd').addClass('input-error')
                    $('#c-pwd').addClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data.includes("is taken")) {
                    $('#uname').addClass('input-error')
                    $('#email').removeClass('input-error')
                    $('#pwd').removeClass('input-error')
                    $('#c-pwd').removeClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data == "Invalid email address &times;") {
                    $('#uname').removeClass('input-error')
                    $('#email').addClass('input-error')
                    $('#pwd').removeClass('input-error')
                    $('#c-pwd').removeClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data.includes("already exists")) {
                    $('#uname').removeClass('input-error')
                    $('#email').addClass('input-error')
                    $('#pwd').removeClass('input-error')
                    $('#c-pwd').removeClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data == "Password must be at least 8 characters &times;") {
                    $('#uname').removeClass('input-error')
                    $('#email').removeClass('input-error')
                    $('#pwd').addClass('input-error')
                    $('#c-pwd').addClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data.includes("must contain numbers upper")) {
                    $('#uname').removeClass('input-error')
                    $('#email').removeClass('input-error')
                    $('#pwd').addClass('input-error')
                    $('#c-pwd').addClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data.includes("Passwords do not match")) {
                    $('#uname').removeClass('input-error')
                    $('#email').removeClass('input-error')
                    $('#pwd').addClass('input-error')
                    $('#c-pwd').addClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data == "An error occured &times;") {
                    $('#uname').addClass('input-error')
                    $('#email').addClass('input-error')
                    $('#pwd').addClass('input-error')
                    $('#c-pwd').addClass('input-error')
                    $(".error-field").addClass('error-message')

                    $(".error-field").html(data)
                }

                if (data == "Registration successfull, proceed to login") {
                    alert(data)
                    location.href = "login.php";
                }



            })
        })
    })
    </script>
</head>

<body>

    <main>
        <section id="login-container">

            <h1>Register</h1>

            <form action="php/register.php" method="POST" id="login-form" autocomplete="off">

                <p class="error-field"></p>

                <p class="unameMessage"></p>
                <input type="text" name="uname" placeholder="Username" id="uname" title="Username">

                <p class="emailMessage"></p>
                <input type="email" name="email" placeholder="Email" id="email" title="Email">


                <p class="passwordMessage"></p>
                <input type="password" name="pwd" placeholder="Password" id="pwd" title="Password">

                <p class="confirmPasswordMessage"></p>
                <input type="password" name="c_pwd" placeholder="Confirm Password" id="c-pwd" title="Confirm Password">

                <div class="show-hide-pass">
                    <input type="checkbox" id="show" title="show password"><span for="show">show password</span>
                </div>

                <button id="register-btn" name="register">Register</button>
                <p class="link">Already have an account? <a href="login.php">login </a>here</p>

            </form>
        </section>
    </main>

    <script src="js/show-hide-pass.js"></script>
</body>

</html>