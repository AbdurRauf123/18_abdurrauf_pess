<?php
	session_start();
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
		Name: <input type="text" name="name">
		User Id: <input type="text" name="userid">
		Password: <input type="password" name="password">
		<input type="submit" name="submit" value="Login">

		
	</form>
		<?php
		$isSubmitClicked = isset($_POST["submit"]);
		if($isSubmitClicked == true) {
			$userId = $_POST["userid"];
			$password = $_POST["password"];
			if($userId == true && $password == true) {
				$name = $_POST["name"];
				$_SESSION["name"] = $name;
				header("location: logcall.php");
			}
			else {
				echo "Invalid login!";
			}
		}
	?>

	<?php
		include "footer.php";
	?>
</body>
</html>