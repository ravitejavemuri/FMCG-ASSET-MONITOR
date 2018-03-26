<html>
<title>Dive In</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<body>

<?php
echo "<center>Welcome To Deep Dive<center>";
?>
<form name="form1" action="store.php" method="get">

<label for="temperature" >DHT sensor value</label>
<input type="text" name="temp" id="temp">
<label for="temperature" >IR sensor value</label>
<input type="text" name="door" id="door">
<label for="temperature" >IR sensor value</label>
<input type="text" name="prod" id="prod">
<label for="Longi" >Lati</label>
<input type="text" name="lat" id="lat">
<label for="Longi" >Longi</label>
<input type="text" name="lon" id="lon">

<input type="submit" value="Store">
</form>

</body>
</html>