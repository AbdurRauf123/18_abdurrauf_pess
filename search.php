<?php
	session_start();
	require_once "db.php";
	$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$sql = "SELECT patrolcar.patrolcar_id,patrolcar_status.patrolcar_status_desc FROM `patrolcar` inner join patrolcar_status on patrolcar.patrolcar_status_id = patrolcar_status.patrolcar_status_id WHERE patrolcar.patrolcar_status_id=1";
	$result = $conn->query($sql);
	$cars = [];
	while($row = $result->fetch_assoc()) {
		$id = $row["patrolcar_id"];
		$status = $row["patrolcar_status_desc"];
		$car = ["id"=>$id,"status"=>$status];
		array_push($cars,$car);
	}
	$conn->close();	
?>
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
		include "header.php";
	?>
	
	<section class="mt-5">
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
		  
		 <div class="form-group row mt-5">
		  <div class="col-sm">
			  <table class="table table-striped table-bordered table-dark">
			  	<tbody>
					<tr>
						<th>Car Number</th>
						<th>Status</th>
					</tr>
					<?php foreach($cars as $car){
						echo "<tr>" .
								"<td>" . $car["id"] . "</td>" .
								"<td>" . $car["status"] . "</td>" .
							"</tr>";
					}
					?> 
				</tbody>
			  </table>
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
