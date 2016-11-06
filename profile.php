<html>
<head>
	<title>ADMIN PAGE</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- my css -->
	<link rel="stylesheet" type="text/css" href="mycss.css">
	<!-- google fonts -->
	    <link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>

</head>
<body>
	<!-- header -->
	<!-- <div class="container-fluid header">
		<div class="col-md-6">
			<p class="intoTxt" style="margin-left:-170px;">ADMIN PAGE</p>
		</div>

		<div class="col-md-2 col-md-offset-3">
			<a href="logout.php" class="btn btn-default form-control logOutBtn" id="logOutBtn">Log Out</a> 
		</div>
	</div> -->
	<div class="container">

	</div><nav class="navbar navbar-inverse" style="height:100px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      	<p class="intoTxt"style="margin-left:100px; margin-top:-10px;">ADMIN PAGE</p>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" class="btn btn-default form-control logOutBtn" id="logOutBtn" style="margin-left:-100px; border:3px solid transparent;"><span style="margin-left:-100px;">Log out</span></a> 
</li>
        <li class="dropdown">
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<!-- all members -->
	<div class="container">
		<div class="col-lg-12">
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-default newData" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> NEW USER</button> 
			<button type="button" class="btn btn-default" id="OpenChatBtn" style="margin-top:10px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> OPEN CHAT</button>

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">New user</h4> 
			      </div>
			      <div class="modal-body">
			        <form action="reg.php" method="post" class="">
				<div class="form-group">
				<!-- name -->
					<input type="text" name="fname" placeholder="name" class="form-control "> 
				</div>
				<div class="form-group">
				<!-- last name -->
					<input type="text" name="lname" placeholder="last name" class="form-control">
				</div>
				<div class="form-group">
					<input type="number" name="age" placeholder="age" class="form-control">
				</div>
				<div class="form-group">
					<select name="selector" id="Myselector" class="form-control selectpicker show-tick">
                    <option data-hidden="true"><span></span>nationality</option>
					<?php
					$hn = 'localhost';
					$db = 'phpVersion';
					$un = 'root';
					$pw = 'root';
					try {
				            $oDb = new PDO("mysql:host=$hn;dbname=$db", $un, $pw);
				        // set the PDO error mode to exception
				            $oDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				            echo "Connected successfully";
				        }
				        catch(PDOException $e)
				        {
				            echo "Connection failed: " . $e->getMessage();
				        }
				        // prepare select from origin table
				        $oQuery = $oDb->prepare("SELECT * FROM origin");
				        $oQuery->execute();
				        $aResults = $oQuery->fetchAll(PDO::FETCH_ASSOC);
				        for( $i = 0; $i < count($aResults); $i++ )
				        {
				        	// set value as an id of nationality and display nationality
				            echo ( "<option value=".$aResults[$i]['nationality_id']."><p class='options'>".$aResults[$i]['nationality']."</p></option>" );
				        }
				        ?>	<br> <br> <br>			
                </div><br>
				<div class="form-group">
						
					<input type="submit" value="SAVE" class="btn btn-default active form-control saveBtn"> </input>
				</div>
			
			 </select>
			 </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>

	</div> <br>
	<div class="container">
		<div class="col-lg-12">
			<table class="table table-bordered">
			<thead>
				<tr>
					<th> First Name </th>
					<th> Last Name </th>
					<th> Age </th>
					<th> Nationality </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
				<?php
				include('connect.php');
				//if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
				//$start_from = ($page-1) * 6; 		
				$result = $db->prepare("SELECT * FROM members INNER JOIN origin ON members.origin_nationality_id = origin.nationality_id ");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
				<!-- display data from db in columns-->
				<td><?php echo $row['fname']; ?></td>
				<td><?php echo $row['lname']; ?></td>
				<td><?php echo $row['age']; ?></td>
				<td><?php echo $row['nationality']; ?></td>
				<td><a href="editform.php?id=<?php echo $row['id']; ?>"> edit </a> | <a href="delete.php?id=<?php echo $row['id']; ?>"> delete </a></td>
			</tr>
			<?php
				}
			?>

			</tbody>
		</table>
</div>
	</div>

</div>
	<!-- jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script>
	$("#OpenChatBtn").click(function(){
		window.open("chat.html");
	});
	</script>
</body>
</html>