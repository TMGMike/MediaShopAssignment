<?php
require './layout.php';


?>
<html lang="en">
<head>
    <title>Register - <?php echo getAppName()?></title>
    <link rel="icon" href="<?php echo getIconPath() ?>" type="image/x-icon">
</head>
<body>
<?php renderMenuLinks();?>
<h3>Register a new account</h3>
<p id='match-err' style="color: red; display: none;">&#9888; <strong>Please ensure your passwords match.</strong></p>
<p id='length-err' style="color: red; display: none;">&#9888; <strong>Your password should be at least 8 characters.</strong></p>
<script>
    function verifyPasswords() {
        var pass        = document.getElementById('pass');
        var toConfirm   = document.getElementById('pass-confirm');
        var loginError  = document.getElementById('match-err');
        var lengthError = document.getElementById('length-err');
        var submitBtn   = document.getElementById('submit-btn');

        // Default the button to enabled, so that if one check fails but another passes, they do not override.
        submitBtn.disabled = false;

        if (pass.value === toConfirm.value) {
            loginError.style.display = "none";
        }
        else {
            submitBtn.disabled = true;
            loginError.style.display = "block";
        }

        if(pass.value.length > 7) {
            lengthError.style.display = "none";
        }
        else {
            submitBtn.disabled = true;
            lengthError.style.display = "block";
        }
    }
</script>
<form method="post" onsubmit="/create">
    <input type="email" name="email" placeholder="Email">
    <input id="pass" type="password" name="pass" placeholder="Password" onkeyup="verifyPasswords()">
    <input id="pass-confirm" type="password" name="pass_confirm" onkeyup="verifyPasswords()" placeholder="Confirm Password">
    <input id="submit-btn" type="submit" value="Create Account">
</form>
<i>Already have an account? Login <a href="login.php">here</a></i>
</body>
</html>

