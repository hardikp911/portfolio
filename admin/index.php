<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="./style.css">

</head>

<body>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Admin</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a81368914c.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<img class="wave" src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/wave.png">
		<div class="container">
			<div class="img">
				<img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/bg.svg">
			</div>
			<div class="login-content">
				<?php
				include('../connection/connection.php');
				session_start();
				$_SESSION['username'] = $_POST["username"];
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$username = $_POST["username"];
					$password = $_POST["password"];

					$query = "SELECT role FROM users WHERE username = '$username' AND password = '$password'";
					$result = mysqli_query($conn, $query);
					$user = mysqli_fetch_assoc($result);

					if ($user) {
						if ($user["role"] == "admin") {

							header("Location: admin.php");
							exit;
						} else {
							// Perform actions for a non-admin user
							$error = true;
						}
					} else {
						$error = true;
					}
				}
				?>
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
					<h2 class="title">Welcome</h2>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Username</h5>
							<input type="text" class="input" name="username">
						</div>
					</div>
					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Password</h5>
							<input type="password" class="input" name="password">
						</div>
					</div>
					<a href="#">Forgot Password?</a>
					<input type="submit" class="btn" value="Login">
				</form>
				<?php if (isset($error) && $error) { ?>

<div class="error-message">Invalid username or password</div>
<?php } ?>
			</div>
		</div>

	</body>

	</html>
	<!-- partial -->
	<script src="./script.js"></script>

</body>

</html>