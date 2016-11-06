<?php
session_start();
$errmsg_arr = array();
$errflag = false;


// new data

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$nationality = $_POST['selector'];
// validation

if($fname == '') {
	$errmsg_arr[] = 'You must enter your First Name';
	$errflag = true;
}
if($lname == '') {
	$errmsg_arr[] = 'You must enter your Last Name';
	$errflag = true;
}
if($age == '') {
	$errmsg_arr[] = 'You must enter your Age';
	$errflag = true;
}
if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	//header("location: profile.php");
	exit();
}

    // configuration
$dbhost 	= "localhost";
$dbname		= "phpVersion";
$dbuser		= "root";
$dbpass		= "root";


 try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_insert = "INSERT INTO members(fname, lname, age, `origin_nationality_id`) VALUES('$fname', '$lname', '$age', '$nationality')"; 
    // use exec() because no results are returned
    header("location: profile.php"); 
    $conn->exec($sql_insert);

    }
catch(PDOException $e)
    {
    echo $sql_insert . "<br>" . $e->getMessage();
    }



?>