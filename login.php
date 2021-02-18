<?php
	if(isset($_SESSION) == false) {
		session_start();
	}

	$has_Cookie_DisplayName = isset($_COOKIE["COOKIE_DISPLAYNAME"]);
	if($has_Cookie_DisplayName == true) {
		$_SESSION["SESS_DISPLAYNAME"] = $_COOKIE["COOKIE_DISPLAYNAME"];
	}

	if(isset($_SESSION["SESS_DISPLAYNAME"])) {
		header("location: logcall.php");
	}

	require_once "db.php";
	$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$isLoginButtonClicked = isset($_POST["btnSubmit"]);
	if($isLoginButtonClicked == true) {
		$userid = $_POST["userid"];
		$password = $_POST["password"];
		$sql = "SELECT * FROM `login` WHERE `user_id`='" . $userid . "' AND `password_id`='" . $password . "'";
		$result = $conn->query($sql);
		
		if($row = $result->fetch_assoc()) {
			$id = $row["user_id"];
			$pass = $row["password_id"];
			
		if($userid == $id && $password == $pass) {
			$_SESSION["SESS_DISPLAYNAME"] = $userid;
			
			$rememberMeChecked = isset($_POST["cbRememberMe"]);
			if($rememberMeChecked == true) {
				$expiryTime = time() + 0;
				setcookie("COOKIE_DISPLAYNAME",$userid,$expiryTime);
			}
			header("location: logcall.php");
		} else {
			echo "<span style='color:red'>Wrong Username / Password </span>";
		}
	}
}
$conn->close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/bootstrap-4.4.1.css">
</head>

<body>
<div class="container" style="width: 900px">
	<?php include "loginheader.php" ?>
	<form action="<?php echo htmlentities($_SERVER["PHP_SELF"])?>" method="post" class="mt-4 py-3">

	  <div class="form-group">
		<label for="username">User Id</label>
		<input type="text" class="form-control" placeholder="Enter your username" name="userid">
	  </div>

	  <div class="form-group">
		<label for="userpassword">Password</label>
		<input type="password" class="form-control" placeholder="Enter your password" name="password">
		<small class="form-text text-muted">We'll never share your password with anyone else.</small>
	  </div>
		
	  <div class="form-group">
		<label for="rememberme">Remember me</label>
		<input type="checkbox" name="cbRememberMe" id="cbRememberMe" value="Yes">
	  </div>	

	  <input type="submit" name="btnSubmit" value="Login" class="btn btn-primary">
		
	</form>
	<?php
		include "footer.php";
	?>
</body>
</html>