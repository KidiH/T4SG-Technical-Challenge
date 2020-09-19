<?php 
	session_start();

	$username = "";
	$email    = "";
	$errors = array(); 
	$fetch_stats = array(); 
	$_SESSION['success'] = "";

	// connect to db
	$db = mysqli_connect('localhost', 'root', '', 'project') or die("could not connect to database");

	// register users
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// collect all invalid inputs in the registration form 
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Passwords do not match");
		}

		// validate that username and email are unique 
		$validate_user_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
		$results = mysqli_query($db, $validate_user_query);
		$user = mysqli_fetch_assoc($result);
		

		if ($user) {
			if($user['username'] === $username) {array_push($errors,"Username already exists");}
			if($user['email'] === $email) {array_push($errors,"Email already in use");}
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1); //encrypt password 
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

		// forward a registered user to home page
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>