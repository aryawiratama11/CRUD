<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM members WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<html>
<head>
	<title>ADMIN PAGE</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- my css -->
	<link rel="stylesheet" type="text/css" href="mycss.css">
	<!-- google fonts -->
	<!-- google fonts -->
	    <link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header -->
	<div class="container-fluid header">
		<div class="col-md-6">
			<p class="intoTxt">Admin page</p>
		</div>

		<div class="col-md-2 col-md-offset-3">
			<a href="logout.php" class="btn btn-default form-control logOutBtn" id="logOutBtn">Log Out</a> 
		</div>
	</div>
	<div class="container">
		<div class="col-md-5 col-md-offset-4">
			<div class="updateBox">
				<form action="edit.php" method="POST">
				<input type="hidden" name="memids" value="<?php echo $id; ?>"  />
				<div class="form-group">
					<input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control input1" />
				</div>
				<div class="form-group">
					<input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control input1"/>
				</div>
				<div class="form-group">
					<input type="text" name="age" value="<?php echo $row['age']; ?>" class="form-control input2" />
				</div>
				<div class="form-group">
					<input type="submit" value="UPDATE" class="form-control btn updateBtn"/>
				</div>
				</form>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<!-- jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>