<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        width: 100%;
        height: 700px;
      }
    </style>
  </head>
  <body>
  <?php
  $deli=0.000001;
	$con=mysqli_connect("mysql7.000webhost.com","a9317919_ravi","raviiot8","a9317919_steel");
	//$con=mysqli_connect("dive.in","root","","steel_mountain");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM `data` WHERE Temperature is NOT NULL ORDER BY timestamp DESC LIMIT 1");
	
	while($row = mysqli_fetch_array($result))
	{
		$latm=$row['Lat'];
		//$latm=$latm*$deli;
		$lam=$row['Long'];
		//$lam=$lam*$deli;
				
	}
	
	?>
    <div id="map"></div>
    <script>
    function initMap() {
  var myLatLng = {lat:<?php echo $latm;?>, lng: <?php echo $lam;?>};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Asset1'

  });
  google.maps.event.addListener(marker, "click", function() {     
	window.open("http://steelmountain.netau.net/main.php","_self");
  
});
}

	  
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyABUlAOWtwKMnT9biF_OkMCb6pFmCLtnFs&callback=initMap">
    </script>
  </body>
</html>