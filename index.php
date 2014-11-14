<?php
// web/index.php
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/point/{id}', function($id) {
	return "<h1>This is some info about point $id</h1>";
});

$app->get('/', function() {
	ob_start();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />

	<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script type="text/javascript">
	var trips = [	
		{name: 'New York', location: L.latLng(40.712784, -74.005941), date:'2014-11-01'},
		{name: 'Boston', location: L.latLng(42.358431, -71.059773), date:'2014-11-01'},
		{name: 'Chicago', location: L.latLng(41.878114, -87.629798), date:'2014-11-01'},

		{name: 'San Francisco', location: L.latLng(37.774929, -122.419416), date:'2014-11-01'},
		{name: 'Las Vegas', location: L.latLng(36.169941, -115.13983), date:'2014-11-01'},
		{name: 'Denver', location: L.latLng(39.737567, -104.984718), date:'2014-11-01'},

		{name: 'South Dakota', location: L.latLng(44.080703, -103.231316), date:'2014-11-01'},
		{name: 'Wyoming', location: L.latLng(43.075968, -107.290284), date:'2014-11-01'},
		{name: 'Montana', location: L.latLng(45.176592, -109.242554), date:'2014-11-01'},
		{name: 'Chicago', location: L.latLng(41.878114, -87.629798), date:'2014-11-01'},
		{name: 'Kansas City', location: L.latLng(39.099727, -94.578567), date:'2014-11-01'},

		{name: 'Istanbul', location: L.latLng(41.005270, 28.97696), date:'2014-11-01'},
		{name: 'Paris 1', location: L.latLng(48.856614, 2.352222), date:'2014-11-01'},
		{name: 'Paris 2', location: L.latLng(48.856614, 2.352222), date:'2014-11-01'},

		{name: 'Amsterdam', location: L.latLng(52.370216, 4.895168), date:'2014-11-01'},

		{name: 'Rome', location: L.latLng(41.872389, 12.48018), date:'2014-11-01'},
		{name: 'Florence', location: L.latLng(43.771033, 11.248001), date:'2014-11-01'},
		{name: 'Venice', location: L.latLng(45.440847, 12.315515), date:'2014-11-01'},

		{name: 'Krakow', location: L.latLng(50.064650, 19.94498), date:'2014-11-01'},

		{name: 'Berlin', location: L.latLng(52.520007, 13.404954), date:'2014-11-01'},
		{name: 'Munich', location: L.latLng(48.135125, 11.581981), date:'2014-11-01'},
		{name: 'Salzburg', location: L.latLng(47.809490, 13.05501), date:'2014-11-01'},
		{name: 'Vienna', location: L.latLng(48.208174, 16.373819), date:'2014-11-01'},
		{name: 'Prague 2', location: L.latLng(50.075538, 14.4378), date:'2014-11-01'},

		{name: 'Dublin', location: L.latLng(53.349805, -6.26031), date:'2014-11-01'},

		{name: 'Marrakech', location: L.latLng(31.630000, -8.008889), date:'2014-11-01'},

		{name: 'Prague 1', location: L.latLng(50.075538, 14.4378), date:'2014-11-01'}
	];
	$(function() {
		var map = L.map('map').setView([51.505, -0.09], 2);

		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
		    maxZoom: 18
		}).addTo(map);

		for (i=0; i < trips.length; i++) {
			console.log(trips[i].name);
			var marker = L.marker(trips[i].location).addTo(map);
		}
	});
	</script>
	<style>
	#map {
		height: 500px;
	}
	</style>

</head>
<body>

	<!--<div id="header-container">
		<header class="wrapper clearfix">
			<h1 id="title">h1#title</h1>
			<nav>
				<ul>
					<li><a href="#">nav ul li a</a></li>
					<li><a href="#">nav ul li a</a></li>
					<li><a href="#">nav ul li a</a></li>
				</ul>
			</nav>
		</header>
	</div>-->
	<div id="main-container">
		<div id="main" class="wrapper clearfix">
			<div id="map"></div>
		</div> <!-- #main -->
	</div> <!-- #main-container -->

	<!--<div id="footer-container">
		<footer class="wrapper">
			<h3>footer</h3>
		</footer>
	</div>-->

</body>
</html>
<?php
return ob_get_clean();
});

$app->run();