<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="fmcglayout.css">

</head>
<body>


<div id="header" >
<h1 class="responsive-width1">F.A.M - FMCG Asset Monitor</h1>
</div>


<div id="nav">
 
  <button type="button" class="button button2 responsive-width" onclick="Temp()">Temp</button></br>
  <button type="button" class="button button3 responsive-width" onclick="Door()" >Door Count</button></br>
<button type="button" class="button button4 responsive-width" onclick="Pro()">Product count</button></br>
<button type="button" class="button button5 responsive-width" onclick="Track()">Tracking</button></br>
</div>
<?php

$con=mysqli_connect("mysql7.000webhost.com","a9317919_ravi","raviiot8","a9317919_steel");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM data");
$Max = mysqli_query($con,"SELECT MAX(Temperature) FROM `data`");
$Min=mysqli_query($con,"SELECT MIN(Temperature) FROM `data`");
$Lat=mysqli_query($con,"SELECT timestamp FROM `data` WHERE Temperature is NOT NULL ORDER BY timestamp DESC LIMIT 1 	 ");

$max=mysqli_fetch_row($Max);
$min=mysqli_fetch_row($Min);
$lat=mysqli_fetch_row($Lat);
$cont=0;
$sense=0;
while($row = mysqli_fetch_array($result))
{

 $row['Temperature'] ;
 $row['Door count'] ;
 $row['Product sense'] ;
 $row['timestamp'];

if($row['Door count']==1)
{
	$cont++;
}
if($row['Product sense']==0)
{
	$sense++;
}

}
mysqli_close($con);
?>

<div id="section" class="table">
  
  
  <table class="table" id="Temperature">
    <thead>
      <tr>
        <th ><h1 id="title"></h1></th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td > <p id="max"></p> </td>
        
      </tr>
      <tr>
        <td > <p id="min"></p></td>
        
      </tr>
	   <tr>
        <td > <p id="lat"></p></td>
        
      </tr>

    </tbody>
  </table>
</div>
</div>
</div>




<div id="footer" class="responsive-width">
Copyright © <a href="https://in.linkedin.com/in/ravitejavemuri">Team GamaPSH</a>
</div>

</body>
</html>
<script>
var min = '<?php echo $min[0];?>';
var max='<?php echo $max[0];?>';
var cont='<?php echo $cont;?>';
var sense='<?php echo $sense;?>';
var latu='<?php echo $lat[0];?>';
function Temp()
{
	document.getElementById("title").innerHTML="Temperature";
	document.getElementById("min").innerHTML= "Minimum: "+min;
	document.getElementById("max").innerHTML="Maximun: "+max;
	document.getElementById("lat").innerHTML="Last Updated: "+latu;
}
function Door()
{
	document.getElementById("min").innerHTML="Last Updated: "+latu;
	document.getElementById("title").innerHTML="Door Count";
	document.getElementById("max").innerHTML= "Open Count: " +cont;
	document.getElementById("lat").innerHTML="";
}
function Pro()
{
	document.getElementById("min").innerHTML="Last Updated: "+latu;
	document.getElementById("title").innerHTML="Product Sense";
	document.getElementById("max").innerHTML= "Product Count: "+sense;
	document.getElementById("lat").innerHTML="";
}
function Track()
{	document.getElementById("min").innerHTML="";
	document.getElementById("max").innerHTML="";
	document.getElementById("lat").innerHTML="";
	document.getElementById("title").innerHTML="";
	window.open("http://steelmountain.netau.net","_self");
	
}
</script>



