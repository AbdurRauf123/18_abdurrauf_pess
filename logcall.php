<?php
	session_start();
	require_once "db.php";
	$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$sql = "SELECT * FROM incident_type";
	$result = $conn->query($sql);
	$incidentTypes = [];
	while($row = $result->fetch_assoc()) {
		$id = $row["incident_type_id"];
		$type = $row["incident_type_desc"];
		$incidentType = ["id"=>$id,"type"=>$type];
		array_push($incidentTypes,$incidentType);
	}
	$conn->close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logcall</title>
<link rel="stylesheet" href="css/bootstrap-4.4.1.css">
</head>

<body>
<div class="container" style="width: 900px">
	<?php
		include "header.php";
	?>
	
	<section class="mt-3">
	  <form action="duplicate.php" method="post">
		  
	    <div class="form-group row">
	      <label for="callerName" class="col-sm-4 col-form-label">Caller's Name</label>
		  <div class="col-sm-8">
			<input type="text" class="form-control" id="callerName" name="callerName">	  
		  </div>
	    </div>
		  
	     <div class="form-group row">
	      <label for="contactNo" class="col-sm-4 col-form-label">Contact No</label>
		  <div class="col-sm-8">
			<input type="text" class="form-control" id="contactNo" name="contactNo">	  
		  </div>
	    </div>
		  
		  <div class="form-group row">
	      <label for="locationOfIncident" class="col-sm-4 col-form-label">Location of Incident</label>
		  <div class="col-sm-8">
			<input type="text" class="form-control" id="locationOfIncident" name="locationOfIncident">	  
		  </div>
	    </div>
		  
		  <div class="form-group row">
	      <label for="typeOfIncident" class="col-sm-4 col-form-label">Type of Incident</label>
		  <div class="col-sm-8">
			<select name="typeOfIncident" id="typeOfIncident" class="form-control">
				<option value="">Select</option>
				<?php
					foreach($incidentTypes as $incidentType) {
						echo "<option value=\"" . $incidentType["id"] . "\">" . $incidentType["type"] . "</option>";
					}
				?>
			</select>  
		  </div>
	    </div>
		  
		  <div class="form-group row">
	      <label for="descriptionOfIncident" class="col-sm-4 col-form-label">Description of Incident</label>
		  <div class="col-sm-8">
			<textarea name="descriptionOfIncident" class="form-control" id="descriptionOfIncident" rows="5"></textarea>
		  </div>
	    </div>
		
		 <div class="form-group row">
		  <div class="offset-sm-5 col-sm-8">
			<button type="submit" class="btn btn-primary" name="btnProcessCall" id="submit">Process Call</button>  
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