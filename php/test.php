<?php
session_start();
include("config.php");

if(isset($_POST['login'])) {

    if (isset($_POST['username']) && trim($_POST['username']) !== "") {
        $email = $_POST['username'];
    } else {
        echo $errors[] = "Please give a email";
    }
    if (isset($_POST['password']) && trim($_POST['password']) !== "") {
        $pass = $_POST['password'];
    } else {
        echo $errors[] = "Please give a password";
    }

    $result_users = $con->query('SELECT * FROM sender WHERE naam="' . $email . '"');
    if (mysqli_num_rows($result_users) == 1) {
        //user
        while ($user = $result_users->fetch_assoc()) {
            if (password_verify($pass, $user['password'])) {
                $_SESSION['username'] = $email;
                header('Location: welcome.php');
            } else {
                //wachtwoord klopt niet
                echo "Password was incorrect";
            }
        }
    }
}

if(isset($_POST['signup'])) {
	if (isset($_POST['username']) && trim($_POST['username']) !== "") {
        $email = $_POST['username'];
    } else {
        echo "Please give a email";
    }
    if (isset($_POST['password']) && trim($_POST['password']) !== "") {
        $pass = $_POST['password'];
		$hashed = password_hash($pass, PASSWORD_BCRYPT);
    } else {
        echo "Please give a password";
    }


	$result_signup = $con->query("INSERT INTO `sender` (naam, password) VALUES ('$email', '$hashed')");
	if ($con->query($result_signup) === false) {
		echo '<div class="alert alert-success"> Account created succesfully. </div>';
		header('Location:test.php');

	} else {
		echo '<div class="alert alert-danger"> There was an error. </div>' . $con->error;
	}
}


?>




<Html>
<head>
    <link rel="stylesheet" href="style.css">
</head>




<h2>corona buurt app</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="email" placeholder="Email" name="username"/>
			<input type="password" placeholder="Password" name="password"/>
            <button type="submit" name="signup">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="username" />
			<input type="password" placeholder="Password"  name="password"/>
			<a href="#">Forgot your password?</a>
            <!-- here we put da app that links to the thingy and we need to remember do not forget cus we are dumb -->
            <button type="submit" name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="main.js"></script>
<footer>
	<p>
		Created <i class="fa fa-heart"></i> by Martijn Middelkoop, Alex Klasser
   </p>
</footer>

</Html>