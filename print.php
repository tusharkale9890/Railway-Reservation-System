<html>
<head>
<title>ACI</title>
<style>
a
{
color:white;
text-decoration:none;
font-weight:900;
background-color:black;
margin-top:200px;
}
.divheader{
height:100%;
width:100%;
background-image:url('13.jpg');
color:white;

background-position:center;
background-repeat:no-repeat;
background-size:cover;



}



</style>
</head>
<body>

<div class="divheader"  align=center>
<h1><font color=yellow size=16 >Indian Central Railway</font></h1>
	<ul>
<a href="index.html">Home</a> |
<a href="Aboutus.html">About Us</a> |
<a href="Contactus.html">Contact Us</a> |
<a href="Feedback.php">Feed Back</a> |
<a href="login.html">Admin</a>
</ul>




<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>



<p style="margin-top:160px;color:white;">Print and present this details upon boarding the Train<br><br>
<div id="print_content" style="width: 400px;color:white 	;background-color:">
<strong><font size=6>Ticket Reservation Details</font><font size=4></strong><br><br>
<?php
include('db.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];
$result = mysql_query("SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysql_fetch_array($result))
	{
		echo 'Transaction Number: '.$row['transactionum'].'<br>';
		echo 'Name: '.$row['fname'].' '.$row['lname'].'<br>';
		echo 'Address: '.$row['address'].'<br>';
		echo 'Contact: '.$row['contact'].'<br>';
		echo 'Payable: '.$row['payable'].'<br>';
	}
$results = mysql_query("SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysql_fetch_array($results))
	{
		$ggagaga=$rows['bus'];
		echo 'Route and Type of Train: ';
		$resulta = mysql_query("SELECT * FROM route WHERE id='$ggagaga'");
		while($rowa = mysql_fetch_array($resulta))
			{
			echo $rowa['route'].'     :'.$rowa['type'];
			$time=$rowa['time'];
			}
		echo '<br>Time of Departure: '.$time;
		echo '<br>';
		echo 'Seat Number: '.$setnum.'<br>';
		echo 'Date Of Travel: '.$rows['date'].'<br>';
		
	}
?>
</div>
<p>-----------------------------------------</p>
<a href="index.html"><font size="5" >Home</font></a>&nbsp &nbsp;
<a href="javascript:Clickheretoprint()"><font size="5">Print</font></a>
</div>

</div>


</body>
</html>