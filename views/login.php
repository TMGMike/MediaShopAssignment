<?php
require './layout.php';
// Note: to filter tables to the media store in IDE, in Object Filter add:   table:^fss.*
?>
<html lang="en">
    <body>
    <?php renderMenuLinks();?>
    <script>
        function verifyPasswords() {
            var pass      = document.getElementById('login-pass');
            var email     = document.getElementById('login-email');
            var error     = document.getElementById('value-err');
            var submitBtn = document.getElementById('login-submit');

            // Default the button to enabled, so that if one check fails but another passes, they do not override.
            submitBtn.disabled = false;

            if (pass.value !== "" && email.value !== "") {
                error.style.display = "none";
            }
            else {
                submitBtn.disabled = true;
                error.style.display = "block";
            }
        }
    </script>
        <h3>Login to your account</h3>
        <p id='value-err' style="color: red; display: none;">&#9888; <strong>Please enter your email and password</strong></p>
        <form method="post" onsubmit="">
            <input onkeyup="verifyPasswords()" id="login-email" type="email" name="email" placeholder="Email">
            <input onkeyup="verifyPasswords()" id="login-pass" type="password" name="pass" placeholder="Password">
            <input id="login-submit" type="submit" value="Login">
        </form>
        <i>Don't have an account? Register <a href="register.php">here</a></i>
    </body>
</html>
