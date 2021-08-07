<?php
include('db.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass=$_POST['password'];
$contact=$_POST['contactno'];

mysql_query("INSERT INTO register (fname, lname, email, password, contactno)
VALUES ('$fname', '$lname', '$email', '$pass', '$contact')");
header("location: login1.html");
?>