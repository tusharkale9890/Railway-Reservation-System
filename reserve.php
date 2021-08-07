<html>
<head>
<title>Reserve</title>
<style>
a
{
color:black;
text-decoration:none;
font-weight:900;
background-color:white;
margin-top:200px;
}
a:hover
{
cursor:pointer;
background:yellow;
}

	
.divheader{
		height:100%;
		width:100%;
		background-image:url('5.jpg');
		color:white;

background-position:center;
background-repeat:no-repeat;
background-size:cover;
	}
	.button
	{		
margin-top:60px;
margin-left:810px;
height: 34px;
 margin-left: 15px; 
 width: 191px; 
 padding: 5px;
 background-color:#1E90FF ;
 
  border:none;
 text-align:center;
 display:inline-box;
 border-radius:18px;
 font-weight:700;
 font-color:blue;
		
	}
	.button:hover
{
cursor:pointer;
background:red;
}
	

</style>
</head>

<body>


<div class="divheader" align=center >
	<h1><font color=black size=16 >Indian Central Railway</font></h1>
	<ul>
<a href="index.html">Home</a> |
<a href="Aboutus.html">About Us</a> |
<a href="Contactus.html">Contact Us</a> |
<a href="">Feed Back</a> |
<a href="login.html">Admin</a>
</ul>

<h1 style="color:skyblue;margin-top:150px;"><font size="23"><b>Reservation</b></font></h1>
<table  align=center >
<form action="selectset.php" method="post" style="margin-bottom:none;">
					<tr><td><font size="6" color=yellow>	<span style="margin-right: 11px;">Select Route: 
						</td><td><select name="route" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						<?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['route'].'  :'.$row['type'].'  :'.$row['time'].' :'.$row['price'];
								echo '</option>';
							}
						?>
						</select>
						</span></td></tr>
						<tr><td><font size="6" color=yellow><span style="margin-right:11px;"><p style="margin-top:25px;">Date:</p> 
						</font></td><td><input type="date"  name="date"  value="" maxlength="10" required style="width: 190px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						</span><br> 
						</span></td></tr>
						<tr><td><b><font size="6" color=yellow><span style="margin-right: 11px;">No. of Passenger: 
						</font></td><td><select name="qty" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						</select>
						</span></td></tr>
						</table>
						<table>
						<tr><input type="submit" id="submit" value="Next" class="button">
						</tr></form>
						</table>
					</div>
</div>


</body>
</html>
