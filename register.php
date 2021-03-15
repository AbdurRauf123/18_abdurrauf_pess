<?php
	session_start();
	
	require_once "db.php";
	$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$isConfirmButtonClicked = isset($_POST["btnConfirm"]);
	if($isConfirmButtonClicked == true) {
		$userid = $_POST["reguserid"];
		$password = $_POST["regpassword"];
		$confirmpass = $_POST["confirmpass"];
		if($password == $confirmpass) {
			$sql = "INSERT INTO `login`(`user_id`, `password_id`) VALUES ('" . $userid . "','" . $confirmpass . "')";
			$result = $conn->query($sql);
			header("location: login.php");
		}
	}$conn->close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="css/bootstrap-4.4.1.css">
</head>

<body>
<div class="container" style="width: 900px">
	<header> <img src="images/Header.jpg" class="img-fluid" alt="PESS">
	  
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
			<ul class="navbar-nav mr-auto">

			  <li class="nav-item active"> <a class="nav-link" href="login.php">Register <span class="sr-only">(current)</span></a> </li>

			</ul>		  
		  </div>
		</nav>
	 </header>
	
	<form action="<?php echo htmlentities($_SERVER["PHP_SELF"])?>" method="post" class="mt-4 py-3">

	  <div class="form-group">
		<label for="username">User Id</label>
		<input type="text" class="form-control" placeholder="What will your username be?" name="reguserid">
	  </div>

	  <div class="form-group">
		<label for="userpassword">Password</label>
		<input type="password" class="form-control" placeholder="What will your password be?" name="regpassword">
		<small class="form-text text-muted">We'll never share your password with anyone else.</small>
	  </div>	
		
	  <div class="form-group">
		<label for="userpassword">Confirm Password</label>
		<input type="password" class="form-control" placeholder="Please retype your password again." name="confirmpass">
	  </div>	

	  <input type="submit" name="btnConfirm" value="Confirm" class="btn btn-primary">
		
	</form>
	<?php
		include "footer.php";
	?>
</body>
</html>