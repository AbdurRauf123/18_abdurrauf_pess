  <header> <img src="images/Header.jpg" class="img-fluid" alt="PESS">
	  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		
      <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <ul class="navbar-nav mr-auto">
			
          <li class="nav-item active"> <a class="nav-link" href="logcall.php">Home <span class="sr-only">(current)</span></a> </li>
			
          <li class="nav-item"> <a class="nav-link" href="dispatch.php">Dispatch</a> </li>
			
		  <li class="nav-item"> <a class="nav-link" href="update.php">Update</a> </li>
			
		  <li class="nav-item"> <a class="nav-link" href="search.php">Search</a> </li>
			
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Reports </a>
			  
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
				
              <div class="dropdown-divider"></div>
				
              <a class="dropdown-item" href="#">Something else here</a> </div>
		   </li>
        </ul>
		<ul class="navbar-nav my-2 my-sm-0" style="color:white">
		   <li>
		   <?php
				$has_Cookie_DisplayName = isset($_COOKIE["COOKIE_DisplayName"]);
				if($has_Cookie_DisplayName == true) {
					$_cookie_DisplayName = $_COOKIE["COOKIE_DisplayName"];
					echo "Welcome <strong>" . $_cookie_DisplayName . "!</strong> [<a href='logout.php'>Logout</a>]";
				} else {
					$has_Session_DisplayName = isset($_SESSION["SESS_DISPLAYNAME"]);
					if($has_Session_DisplayName == true) {
						$session_DisplayName = $_SESSION["SESS_DISPLAYNAME"];
						echo "Welcome <strong>" . $session_DisplayName . "!</strong> [<a href='logout.php'>Logout</a>]";
					}
				}
		   ?>
		   </li>
		</ul>
      </div>
    </nav>
  </header>