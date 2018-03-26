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
	$con=mysqli_connect("mysql7.000webhost.com","a9317919_ravi","raviiot8","a9317919_steel");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM `data`");
	
	while($row = mysqli_fetch_array($result))
	{
		$row['Lat'];
		$row['Long'];
				
	}
	
	?>
    <div id="map"></div>
    <script>
    function initMap() {
  var myLatLng = {lat: <?php echo $latm;?>, lng: <?php echo $lam;?>};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 20,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Asset1'

  });
  google.maps.event.addListener(marker, "click", function() {     
window.open("http://steelmountain.netau.net","_blank");
});
}

	  
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyABUlAOWtwKMnT9biF_OkMCb6pFmCLtnFs&callback=initMap">
    </script>
  </body>
</html>