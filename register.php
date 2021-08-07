<?php
	//Start session
	session_start();
	
	//Connect to mysql server
	require "db.php";
	
	//Function to sanitize values received from the form. Prevents SQL injection
	/*function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);z
		}
		return mysql_real_escape_string($str);
	*/
	
	//Sanitize the POST values
	$fname = $_POST['username'];
	$password = $_POST['password'];
	
	//Create query
	$qry="SELECT * FROM register WHERE fname='$fname' AND password='$password'";
	$result=mysql_query($qry);
	//while($row = mysql_fetch_array($result))
//  {
//  $level=$row['position'];
//  }
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			//session_regenerate_id();
			//$member = mysql_fetch_assoc($result);
			//$_SESSION['SESS_First_Name'] = $member['fname'];
			//$_SESSION['SESS_password'] = $member['password'];
			//session_write_close();
			//if ($level="User"){
			header("location: reserve.php");
			exit();
		}else {
			//Login failed
			echo "<script type='text/javascript'>";
			
			echo "alert('Enter Your Correct First Name & Password')";
			echo "</script>";
			
			header("location: index.html");
			exit();
		}
	}else {
		die("Query failed");
	}
?>