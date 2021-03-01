<?php
	$callerName = $_POST["callerName"];
	$contactNo = $_POST["contactNo"];
	$locationOfIncident = $_POST["locationOfIncident"];
	$typeOfIncident = $_POST["typeOfIncident"];
	$descriptionOfIncident = $_POST["descriptionOfIncident"];

	require_once "db.php";
	$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$sql = "SELECT `caller_name`,`phone_number`,`incident_location`, `incident_desc`, `incident_type_id` FROM `incident` WHERE `incident_status_id`=1 OR 2 ORDER BY caller_name ASC";
	$result = $conn->query($sql);
	$datas = [];
	while($row = $result->fetch_assoc()) {
		$name = $row["caller_name"];
		$number = $row["phone_number"];
		$location = $row["incident_location"];
		$desc = $row["incident_desc"];
		$type = $row["incident_type_id"];
		$data = ["name"=>$name,"number"=>$number,"location"=>$location,"desc"=>$desc,"type"=>$type];
		array_push($datas,$data);
	}
	$conn->close();	

	$btnProcessCallClicked = isset($_POST["btnProcessCall"]);
	if($btnProcessCallClicked == false) {
		header("location: logcall.php");
	}

	if(isset($_POST["btnProceed"]) == true) {
		echo "location: dispatch.php";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Duplicate</title>
<link rel="stylesheet" href="css/bootstrap-4.4.1.css">
</head>

<body>
<div class="container" style="width: 900px">
	<?php
		include "header.php";
	?>
	<section class="mt-3 py-3">
	<form action="dispatch.php" method="post">
		
		
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
		  <div class="offset-sm col-sm">
			  <table class="table table-striped table-bordered table-dark">
			  	<tbody>
					<tr>
						<th>Caller Name</th>
						<th>Contact No</th>
						<th>Location</th>
						<th>Incident Description</th>
						<th>Incident Type</th>
					</tr>
					<?php foreach($datas as $data){
						echo "<tr>" .
								"<td>" . $data["name"] . "</td>" .
								"<td>" . $data["number"] . "</td>" .
								"<td>" . $data["location"] . "</td>" .
								"<td>" . $data["desc"] . "</td>" .
								"<td>" . $data["type"] . "</td>" .
							"</tr>";
					}
					?> 
				</tbody>
			  </table>
		  </div>
	    </div>
		  

		 <div>
			<button type="submit" class="btn btn-danger offset-sm-2" name="btnDuplicate" id="submit">Duplicate Call</button>
			<button type="submit" class="btn btn-primary offset-sm-5" name="btnProceed" id="submit">Proceed</button>  
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