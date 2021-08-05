<?php
$message = "";
$error = array();
if (empty($_POST['username'])) {
	$error['username'] = "Please fill out this field";
}
if (empty($_POST['password'])) {
	$error['password'] = "Please fill out this field";
}

if (count($error) == 0) {
	session_start();
	if (count($_POST) > 0) {
		$cn = mysqli_connect('localhost', 'root', '', 'db2008a0') or die('Unable To connect');
		$result = mysqli_query($cn, "SELECT * FROM tbadmin WHERE username='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'");
		$row  = mysqli_fetch_array($result);
		if (is_array($row)) {

			$_SESSION["username"] = $row['username'];

			$_SESSION["password"] = $row['password'];
		} else {
			$message =  " <h4>Invalid Username or Password!</h4>";
		}
	}
	if (isset($_SESSION["username"])) {
		header("Location:index-admin.php");
	}
}
?>


<html>

<head>
	<title>User Login</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

		body {
			overflow: hidden;
			background: linear-gradient(90deg, #C7C5F4, #776BCC);
			margin: 0;
			padding: 0;
			font-family: Raleway, sans-serif;
			height: 100vh;
		}

		.container {
			position: absolute;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 400px;
		}

		.screen {
			background: linear-gradient(90deg, #5D54A4, #7C78B8);
			position: absolute;
			height: 540px;
			width: 360px;
			box-shadow: 0px 0px 24px #5C5696;
		}

		.screen__content {
			z-index: 1;
			position: relative;
			height: 100%;
		}

		.screen__background {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 0;
			-webkit-clip-path: inset(0 0 0 0);
			clip-path: inset(0 0 0 0);
		}

		.screen__background__shape {
			transform: rotate(45deg);
			position: absolute;
		}

		.screen__background__shape1 {
			height: 520px;
			width: 520px;
			background: #FFF;
			top: -50px;
			right: 120px;
			border-radius: 0 72px 0 0;
		}

		.screen__background__shape2 {
			height: 220px;
			width: 220px;
			background: #6C63AC;
			top: -172px;
			right: 0;
			border-radius: 32px;
		}

		.screen__background__shape3 {
			height: 540px;
			width: 190px;
			background: linear-gradient(270deg, #5D54A4, #6A679E);
			top: -24px;
			right: 0;
			border-radius: 32px;
		}

		.screen__background__shape4 {
			height: 400px;
			width: 200px;
			background: #7E7BB9;
			top: 420px;
			right: 50px;
			border-radius: 60px;
		}

		.login {
			width: 320px;
			padding: 30px;
			padding-top: 156px;
		}

		.login__field {
			padding: 20px 0px;
			position: relative;
		}

		.login__icon {
			position: absolute;
			top: 30px;
			color: #7875B5;
		}

		.login__input {
			border: none;
			border-bottom: 2px solid #D1D1D4;
			background: none;
			padding: 10px;
			padding-left: 24px;
			font-weight: 700;
			width: 75%;
			transition: .2s;
		}

		.login__input:active,
		.login__input:focus,
		.login__input:hover {
			outline: none;
			border-bottom-color: #6A679E;
		}

		.login__submit {
			background: #fff;
			font-size: 14px;
			margin-top: 30px;
			padding: 16px 20px;
			border-radius: 26px;
			border: 1px solid #D4D3E8;
			text-transform: uppercase;
			font-weight: 700;
			display: flex;
			align-items: center;
			width: 100%;
			color: #4C489D;
			box-shadow: 0px 2px 2px #5C5696;
			cursor: pointer;
			transition: .2s;
		}

		.login__submit:active,
		.login__submit:focus,
		.login__submit:hover {
			border-color: #6A679E;
			outline: none;
		}

		.button__icon {
			font-size: 24px;
			margin-left: auto;
			color: #7875B5;
		}

		.social-login {
			position: absolute;
			height: 140px;
			width: 160px;
			text-align: center;
			bottom: 0px;
			right: 0px;
			color: #fff;
		}

		.social-icons {
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.social-login__icon {
			padding: 20px 10px;
			color: #fff;
			text-decoration: none;
			text-shadow: 0px 0px 8px #7875B5;
		}

		.social-login__icon:hover {
			transform: scale(1.5);
		}
	</style>

</head>

<div class="container">
	<form class="login" name="frmUser" method="POST" action="">

		<div class="message"><?php if ($message != "") {
									echo $message;
								} ?></div>
		<div class="screen">
			<div class="screen__content">
				<form class="login">
					<h2 style="padding:1rem">LOGIN</h2>
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" name="username" id="username" class="login__input" placeholder="User name " require> <?php
																																if (isset($error['username'])) {
																																	echo "<br>";
																																	echo ($error['username']);
																																}
																																?>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" name="password" id="password" class="login__input" placeholder="Password" require>

						<?php
						if (isset($error['password'])) {
							echo "<br>";
							echo $error['password'];
						}
						?>
					</div>
					<button class="button login__submit">
						<span class="button__text">Log In Now</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</form>
				<div class="social-login">
					<h3>Login For Admin</h3>
					<div class="social-icons">
						<a href="#" class="social-login__icon fab fa-instagram"></a>
						<a href="#" class="social-login__icon fab fa-facebook"></a>
						<a href="#" class="social-login__icon fab fa-twitter"></a>
					</div>
				</div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</form>
</div>
</body>
</html>