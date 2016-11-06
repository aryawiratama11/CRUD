<?php
// create connection
$con = mysqli_connect("localhost","root","root","pdo_ret");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if(isset($_POST['submit'])){
  	if(empty($_POST['username']) || empty($_POST['password'])){
  		$error = "both fields are required";
  	}
  else{
		// define $username and $password
  		$username = $_POST['username'];
  		$password = $_POST['password'];
	 	// check username and password from database
  		$sql = "SELECT admin_id FROM admin WHERE username='$username' AND password='$password'";
  		$result = mysqli_query($con, $sql);
  		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 	 	// if username and password exists in database then create a session otherwise call error
  		if(mysqli_num_rows($result) == 1){
  			// if it matches then go to another page
  		header("location:profile.php");
   		}
  		else{
  			$error = "incorrect login or password";
  		}
	}
  }
?>
<html>
<head>
	<title>ADMIN PAGE</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- my css -->
	<link rel="stylesheet" type="text/css" href="mycss.css">
</head>
<body>
	<!--login container -->
	<div class="container">
		<div class="col-md-12 loginContainer">
			<form method="post">
				<div class="form-group">
					<input type="text" name="username" placeholder="username" id="username" class="form-control input1">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="password" class="form-control input2">
				</div>
				<div class="form-group">
					<button type="submit" name="submit" id="loginBtn" class="btn btn form-control loginBtn">LOG IN</button>
				</div> <br>
				<div class="form-group">
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-default form-control " data-toggle="modal" data-target="#myModal" style="letter-spacing:2px;width:80%; margin-left:40px;">Forgot password?</button>

					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">
 <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header"></div>
                            <div class="modal-body">
                                    <!-- MODAL BODY-->
                                    <div class="phoneForm">
                                        <h3>Enter your valid phone number:</h3>
                                        <div class="form-group">
                                            <input type="text" id="phoneInput" class="phoneReminder modalInput form-control" name="phone" placeholder="phone" style="text-align:center;">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" id="remindBtn" class="btn btn-default active sendSmsBtn form-control">REMIND</button>
                                        </div>
                                    </div>
                                <!-- show message from API if it's save or not -->
                                <div id="showSendMsg"></div>
                            </div><!-- end of the modal body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="closeBtnMember" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div><!-- end of the modal content -->

					  </div>
					</div>
				</div>
			</form>
			<div class="errorMsg"><p><?php echo $error;?></p></div>
			</form>
		</div>
	</div>
	<!-- jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script>
	 // forget btn
    $(document).on("click", "#remindBtn", function(){
        // notifications
        document.addEventListener('DOMContentLoaded', function () {
            if (Notification.permission !== "granted")
                Notification.requestPermission();
            });
            var audio = new Audio('sound.mp3');
            if (!Notification) {
                alert('Desktop notifications not available in your browser. Try Chromium.');
                return;
            }
            if (Notification.permission !== "granted")
                Notification.requestPermission();
            else {
                var notification = new Notification('WARNING', {
                    icon: 'lajk.jpg',
                    body: "Sms already send!!",
                });
                audio.play();
            }
        var phoneInput = $("#phoneInput").val();
        remindMsgFinal = "username: admin, password: admin";
        remindMsgFinal = encodeURIComponent(remindMsgFinal);
        console.log(remindMsgFinal);
        var theLink = 'http://www.ecuanota.com/api-send-sms?key=M2Iz-NDBi-ODI0-MjYw-ZGVh-YWQy-ODdk-ZmEy-YTE0-Mzll-NTc5&mobile='+phoneInput+'&message='+remindMsgFinal;
        console.log(theLink);
    });

	</script>
</body>
</html>