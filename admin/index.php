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
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


?>
	<body>
		<img class="wave" src="./wave.png">
		<div class="container">
			<div class="img">
				<img src="./bg.svg">
			</div>
			<div class="login-content">
				<?php
				session_start();

				// Check if the form is submitted
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					require '../connection/connection.php';

					// Get username and password from form
					$username = $_POST['username'];
					$password = $_POST['password'];

					// SQL query to check if user exists and get role
					$sql = "SELECT * FROM hardikLogin WHERE username = '$username' AND password = '$password'";
					$result = $conn->query($sql);

					if ($result->num_rows == 1) {
						// User exists, fetch the role
						$row = $result->fetch_assoc();
						$role = $row['role'];

						if ($role == 'admin') {
							// Set session variables
							$_SESSION['username'] = $username;
							$_SESSION['role'] = $role;

							// Redirect to admin.php
							header("Location: admin.php");
							exit();
						} else {
							echo "You do not have permission to access this page.";
						}
					} else {
						echo "Invalid username or password.";
					}

					$conn->close();
				}
				?>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<img src="./avatar.svg">
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
			</div>
		</div>

	</body>

	</html>
	<!-- partial -->
	<script src="./script.js"></script>

</body>

</html>