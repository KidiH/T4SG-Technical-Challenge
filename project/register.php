<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
			<div class=box>
			<form method="post" action="register.php">
			<h2 class = "header">Register</h2>
				<?php include('errors.php'); ?>

				<div class="input-group" <?php if (isset($errorsname)): ?> class="form_error" <?php endif ?>>
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $username; ?>" required>
					<?php if (isset($errorsname)): ?>
				<span><?php echo $errorsname; ?></span>
			<?php endif ?>
				</div>
				<div class="input-group">
					<label>Email</label>
					<input type="email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password_1" required>
				</div>
				<div class="input-group">
					<label>Confirm password</label>
					<input type="password" name="password_2" required>
				</div>
				<?php if (isset($errorsname)): ?>
			<span><?php echo $errorsname; ?></span>
			<?php endif ?>
				<div class="input-group">
					<button type="submit" class="btn" name="reg_user">Register</button>
				</div>
				<p>
					Already have an account? <a href="login.php" class="link"><b>Sign in</b></a>
				</p>
			</form>
				</div>
		
</body>
</html>