<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet"  href="css\style.css">
</head>
<body>
	<div class="header">
		
	</div>
	<div class="content">
	<h2 class="header">Home Page</h2>
		
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		
		<?php  if (isset($_SESSION['username'])) : ?>
			
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<img src = "images/placeholder.jpg" onclick = "triggerClick()" id="profileDisplay"/>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
			<p> Update Profile <a href="image-upload.php" class="link"> here </a> </p>
		<?php endif ?>
	</div>
		
</body>
</html>