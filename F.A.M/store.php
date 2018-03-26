<html>
<head><title>Storing...</title></head>
<body>
<?php


$db=mysqli_connect("mysql7.000webhost.com","a9317919_ravi","raviiot8","a9317919_steel")or die("unable to connect");
$temp=mysqli_real_escape_string($db,$_GET['temp']);
$ir=mysqli_real_escape_string($db,$_GET['door']);
$product=mysqli_real_escape_string($db,$_GET['prod']);
$lat=mysqli_real_escape_string($db,$_GET['lat']);
$lon=mysqli_real_escape_string($db,$_GET['lon']);


$sql="INSERT INTO `data`(`Temperature`,`Door count`,`Product sense`,`Lat`,`Long`) VALUES ('$temp','$ir','$product','$lat','$lon')";
$varr=mysqli_query($db,$sql);
if($varr)
	echo "data stored";
else	
	echo " data not stored";
	
mysqli_close($db);	
?>

</body>
</html>
