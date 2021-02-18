<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Search Patrol Car</title>
<link rel="stylesheet" href="css/bootstrap-4.4.1.css">
</head>

<body>
<div class="container" style="width: 900px">
	<?php
		$has_Cookie_DisplayName = isset($_COOKIE["COOKIE_DisplayName"]);
		if($has_Cookie_DisplayName == true) {
			$_cookie_DisplayName = $_COOKIE["COOKIE_DisplayName"];
			echo "Welcome <strong>" . $_cookie_DisplayName ."!</strong> [<a href='logout.php'>Logout</a>]";
		} else {
			if(isset($_SESSION) == false) {
				session_start();
			}
			$has_Session_DisplayName = isset($_SESSION["SESS_DISPLAYNAME"]);
			if($has_Session_DisplayName == true) {
				$session_DisplayName = $_SESSION["SESS_DISPLAYNAME"];
				echo "Welcome <strong>" . $session_DisplayName . "!</strong> [<a href='logout.php'>Logout</a>]";
			} else {
				echo "<a href='login.php'>Login</a>";
			}
		}
	?>
	
  	<?php
		include "searchheader.php";
	?>
	
	<section class="mt-3">
	  <form action="update.php" method="post">
		  
	    <div class="form-group row">
	      <label for="patrolCar" class="col-sm-3 col-form-label">Patrol Car Number</label>
		  <div class="col-sm-3">
			<input type="text" class="form-control" id="patrolCarId" name="patrolCarId">	  
		  </div>
		  <div class="col-sm-6">
			 <button type="submit" class="btn btn-primary" name="btnSearch" id="submit">Search</button> 
		  </div>
		</div>
		  
      </form>
    </section>
	
	<?php
		include "footer.php";
	?>
	
</div>
<script src="js/jquery-3.4.1.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
