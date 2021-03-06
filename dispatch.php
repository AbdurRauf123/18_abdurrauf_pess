<?php
	session_start();
	$callerName = $_POST["callerName"];
	$contactNo = $_POST["contactNo"];
	$locationOfIncident = $_POST["locationOfIncident"];
	$typeOfIncident = $_POST["typeOfIncident"];
	$descriptionOfIncident = $_POST["descriptionOfIncident"];

	require_once "db.php";
	$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$sql = "SELECT patrolcar.patrolcar_id,patrolcar_status.patrolcar_status_desc FROM `patrolcar` inner join patrolcar_status on patrolcar.patrolcar_status_id = patrolcar_status.patrolcar_status_id WHERE patrolcar.patrolcar_status_id=3";
	$result = $conn->query($sql);
	$cars = [];
	while($row = $result->fetch_assoc()) {
		$id = $row["patrolcar_id"];
		$status = $row["patrolcar_status_desc"];
		$car = ["id"=>$id,"status"=>$status];
		array_push($cars,$car);
	}
	$conn->close();	

	$btnDispatchClicked = isset($_POST["btnDispatch"]);
	$btnProceedClicked = isset($_POST["btnProceed"]); 
	if($btnDispatchClicked == false && $btnProceedClicked == false) {
		header("location: logcall.php");
	}

	if($btnDispatchClicked == true) {
		$insertIncidentSuccess = false;
		$hasCarSelection = isset($_POST["cbCarSelection"]);
		$patrolcarDispatched = [];
		$numOfPatrolCarDispatched = 0;
		if($hasCarSelection == true) {
			$patrolcarDispatched = $_POST["cbCarSelection"];
			$numOfPatrolCarDispatched = count($patrolcarDispatched);
		}
		$incidentStatus = 0;
		
		if($numOfPatrolCarDispatched > 0) {
			$incidentStatus = 2; //dispatched
		}
		else {
			$incidentStatus = 1; //pending
		}
		$callerName = $_POST["callerName"];
		$contactNo = $_POST["contactNo"];
		$locationOfIncident = $_POST["locationOfIncident"];
		$typeOfIncident = $_POST["typeOfIncident"];
		$descriptionOfIncident = $_POST["descriptionOfIncident"];
		
		$sql = "INSERT INTO `incident`(`caller_name`, `phone_number`, `incident_type_id`, `incident_location`, `incident_desc`, `incident_status_id`, `time_called`) VALUES ('" . $callerName . "','" . $contactNo . "','" . $typeOfIncident . "','" . $locationOfIncident . "','" . $descriptionOfIncident . "','" . $incidentStatus . "',now())";
		//echo $sql;
		$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
		$insertIncidentSuccess = $conn->query($sql);
		if($insertIncidentSuccess == false) {
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
		$incidentId = mysqli_insert_id($conn);
		//echo "<br>new incident id: " . $incidentId;
		$updateSuccess = false;
		$insertDispatchSuccess = false;
		
		foreach($patrolcarDispatched as $eachCarId) {
			//echo $eachCarId . "<br>";
			$sql = "UPDATE `patrolcar` SET `patrolcar_status_id`='1' WHERE `patrolcar_id`='" . $eachCarId . "' ";
			$updateSuccess = $conn->query($sql);
			
			if($updateSuccess == false) {
				echo "Error:" . $sql . "<br>" . $conn->error;
			}
			
			$sql = "INSERT INTO `dispatch`(`incident_id`, `patrolcar_id`, `time_dispatched`) VALUES (" . $incidentId . ",'" . $eachCarId . "',now()) ";
			$insertDispatchSuccess = $conn->query($sql);
			
			if($insertDispatchSuccess == false) {
				echo "Error:" . $sql . "<br>" . $conn->error;
			}
		}
		$conn->close();
		
		if($insertDispatchSuccess == true && $updateSuccess == true) {
			header("location: logcall.php");
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dispatch</title>
<link rel="stylesheet" href="css/bootstrap-4.4.1.css">
</head>

<body>	
<div class="container" style="width: 900px">
  	<?php
		include "header.php";
	?>
	
	<section class="mt-3">
	  <form action="<?php echo htmlentities($_SERVER["PHP_SELF"])?>" method="post">
		  
	    <div class="form-group row">
	      <label for="callerName" class="col-sm-4 col-form-label">Caller's Name</label>
		  <div class="col-sm-8">
			  <span>
			  	<?php echo $callerName; ?>
				<input type="hidden" id="callerName" name="callerName" value="<?php echo $callerName; ?>">	
			  </span>
		  </div>
	    </div>
		  
	     <div class="form-group row">
	      <label for="contactNo" class="col-sm-4 col-form-label">Contact No</label>
		  <div class="col-sm-8">
			  <span>
			  	<?php echo $contactNo; ?>
				<input type="hidden" id="contactNo" name="contactNo" value="<?php echo $contactNo; ?>">
			  </span>
		  </div>
	    </div>
		  
		  <div class="form-group row">
	      <label for="locationOfIncident" class="col-sm-4 col-form-label">Location of Incident</label>
		  <div class="col-sm-8">
			  <span>
			  	<?php echo $locationOfIncident; ?>
				<input type="hidden" id="locationOfIncident" name="locationOfIncident" value="<?php echo $locationOfIncident; ?>">
			  </span>
		  </div>
	    </div>
		  
		  <div class="form-group row">
	      <label for="typeOfIncident" class="col-sm-4 col-form-label">Type of Incident</label>
		  <div class="col-sm-8">
			  <span>
			  	<?php echo $typeOfIncident; ?>
				<input type="hidden" name="typeOfIncident" id="typeOfIncident" class="form-control" value="<?php echo $typeOfIncident; ?>"> 
			  </span>
		  </div>
	    </div>
		  
		  <div class="form-group row">
	      <label for="descriptionOfIncident" class="col-sm-4 col-form-label">Description of Incident</label>
		  <div class="col-sm-8">
			  <span>
			  	<?php echo $descriptionOfIncident; ?>
				<input  type="hidden" name="descriptionOfIncident" id="descriptionOfIncident" value="<?php echo $descriptionOfIncident; ?>">
			  </span>
		  </div>
	    </div>
		
		  <div class="form-group row">
	      <label for="patrolCar" class="col-sm-4 col-form-label">Choose Patrol Car(s)</label>
		  <div class="col-sm-8">
			  <table class="table table-striped table-bordered table-dark">
			  	<tbody>
					<tr>
						<th>Car Number</th>
						<th>Status</th>
						<th></th>
					</tr>
					<?php foreach($cars as $car){
						echo "<tr>" .
								"<td>" . $car["id"] . "</td>" .
								"<td>" . $car["status"] . "</td>" .
								"<td>" .
									"<input type=\"checkbox\" " .
									"value=\"". $car["id"] . "\" " .
									"name=\"cbCarSelection[]\">" .
								"</td>" .
							"</tr>";
					}
					?> 
				</tbody>
			  </table>
		  </div>
	    </div>
		  
		 <div class="form-group row">
		  <div class="offset-sm-5 col-sm-8">
			<button type="submit" class="btn btn-primary" name="btnDispatch" id="submit">Dispatch</button>  
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
