<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../Assets/gemora.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<div class="accbg">
		<div class="imgbg">
			<img src="../Assets/img/accbg2.jpg" alt="" class="symbol_cta">
		</div>
		<div class="fillin">
			<div class="fillin2">
				<h1>Register</h1>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateSignup()">
					<div class="detail">
						Enter your user name <br>
						<input type="text" name="name" placeholder="" class="first" id="first" required>
					</div>

					<div class="detail">
						Enter your age <br>
						<input type="text" name="age" placeholder="" class="first" id="first" required>
					</div>

					<div class="detail" required>
						<input class="gender" type="radio" name="gender" value="male"> Male
						<input class="gender" type="radio" name="gender" value="female"> Female
						<input class="gender" type="radio" name="gender" value="others"> Others
					</div>

					<div class="detail">
						Enter your email address <br>
						<input type="text" name="email" placeholder="" class="first" id="email" required>
					</div>

					<div class="detail">
						Enter your password <br>
						<input type="password" name="password" placeholder="" class="first" id="pw1" required>
					</div>

					<div class="detail">
						User Profile <br>
						<input type="file" id="image" name="user_image" required class="first">
					</div>

					<div class="detail">
						<button class="signin" type="submit" name="submit">Register</button> <br>
						<p class="aldy">You already have a account?</p>
						<a href="signin.php" class="going">Go to sign in form</a>
					</div>
				</form>
				<div class="backhp">
					<a href="home.php"><img src="../Assets/img/left-arrow.png" alt="">Back to home page</a>
				</div>
			</div>
		</div>
	</div>

	<?php
	session_start();
	require_once("../Admin/database/data_connection.php");
	require_once "../Admin/database/methods.php";
	require_once("../Admin/database/insert_data.php");
	require_once("../Admin/database/does_user_exist.php");

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = 'user';

		$img_url = $_FILES['user_image']['name'];
		$tmp_name = $_FILES['user_image']['tmp_name'];

		$target_dir = "../Assets/profileimg/" . $img_url;

		if (doesUserExist($pdo, $email)) {
			echo "<script>alert('Email Already Existed!');</script>";
		} else {
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			if (move_uploaded_file($tmp_name, $target_dir)) {
				$user = [
					'name' => $name,
					'age' => $age,
					'gender' => $gender,
					'email' => $email,
					'password' => $hashed_password,
					'role' => $role,
					'img_url' => $img_url
				];
				insertData($pdo, $user);
				$_SESSION["id"] = $pdo->lastInsertId();
				echo "<script>alert('You have registered successfully!');</script>";
				header("Location: home.php");
				exit();
			} else {
				echo "<script>alert('Error uploading image.');</script>";
			}
		}
	}
	?>

</body>


</html>