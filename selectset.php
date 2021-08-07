<html>
<head>
<title>Reserve</title>
<style>
a
{
color:white;
text-decoration:none;
font-weight:bold;

margin-top:200px;
}
a:hover
{
cursor:pointer;
background:blue;
}
.divheader{
height:100%;
width:100%;
background-image:url('8.jpg');
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
<a href="">Feed Back</a> |
<a href="login.html">Admin</a>
</ul>





<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<style>
body{
font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
	
margin:0 auto;
width:400px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{
	
border:none;
background:none;
}
#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#stylized .small{
color:white;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}
#stylized button{
clear:both;
margin-left:150px;
width:125px;
height:31px;
background:blue;
border-radius:58px;
text-align:center;
line-height:31px;
color:#FFFFFF;
font-size:11px;
font-weight:bold;
}
#stylized button:hover
{
cursor:pointer;
background:red;
}
</style>
<?php
include('db.php');
$busnum=$_POST['route'];
$date=$_POST['date'];
$qty=$_POST['qty'];
$result = mysql_query("SELECT * FROM route WHERE id='$busnum'");
while($row = mysql_fetch_array($result))
	{
		$numofseats=$row['numseats'];
		$query = mysql_query("SELECT sum(seat_reserve) FROM reserve where date = '$date'");
							while($rows = mysql_fetch_array($query))
							  {
							  $inogbuwin=$rows['sum(seat_reserve)'];
							  }
		$avail=$numofseats-$inogbuwin;
		$setnum=$inogbuwin+1;
	}
?>
<?php
if ($avail < $qty){
echo 'Qty reserve exced the available seat of the Railway';
}
else if($avail > 0)
{
?>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["form"]["fname"].value;
if (x==null || x=="")
  {
  alert("First Name must be filled out");
  return false;
  }
var y=document.forms["form"]["lname"].value;
if (y==null || y=="")
  {
  alert("Last Name must be filled out");
  return false;
  }
var a=document.forms["form"]["address"].value;
if (a==null || a=="")
  {
  alert("Address must be filled out");
  return false;
  }
var b=document.forms["form"]["contact"].value;
if (b==null || b=="")
  {
  alert("Contact Number must be filled out");
  return false;
  }
  
  
}
function xy()
{
	b=confirm("Are You Sure Confirm This Reservation!!!!!");
 if(b==false)
{
alert("Sorry..!!! Your Reservation Is Cancel");
return false;
}
else{
alert("Congrats!!! Your Reservation is Successfully Confirm");
 return true;
  
}
}

	
</script>
<p style="margin-top:70px;"><font size="6" color="violetblue" ><b><u>Enter Your Information</u><b></font></p>
<div id="stylized" class="myform" style="margin-top:55px;margin-left:475px">

<form id="form" name="form" action="save.php" method="post"  onsubmit="return xy()" >
<input type="hidden" value="<?php echo $busnum ?>" name="busnum" />
<input type="hidden" value="<?php echo $date ?>" name="date" />
<input type="hidden" value="<?php echo $qty ?>" name="qty" />
<label><font size=4>Seat Number
<span class="small">Auto Generated <a rel="facebox" href="seatlocation.php?id=<?php echo $busnum; ?>"><font color="green">view seat</font></a></span>
</label>
<input type="text" name="setnum" value="
<?php
$N = $qty;
for($i=0; $i < $N; $i++)
{
echo $i+$setnum.', ';
} 
 ?>
" id="name" readonly/><br>
<label><font size=4>First Name

</label>
<input type="text" name="fname" placeholder="Enter first name"  required id="name"/><br>
<label><font size=4>Last name

</label>
<input type="text" name="lname" placeholder="Enter last name" required id="name"/><br>
<label><font size=4>Address

</label>
<input type="text" name="address" placeholder="Enter address" required  id="name"/><br>
<label><font size=4>Contact
</label>
<input type="text" name="contact" placeholder="Enter Contact No"  required did="name"/><br>
<button type="submit"><font size=4>Confirm</button>
</form>
</div>
<?php
}
else if($avail <= 0)
{
echo 'no available sets';
}
?>



</div>
</body>
</html>
