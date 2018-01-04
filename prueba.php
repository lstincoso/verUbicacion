<!DOCTYPE html>
<html>
  <head>
    <?php

    include('db_conection.php');

    $dni=$_GET["dni"];

    $result= pg_query($dbconnect,"SELECT lat_user, lon_user FROM location WHERE id_user ='$dni' ");
    $rows = pg_num_rows($result);

    $respuesta=" ";
    $latv2="latitud";
    $long="longitud";

    if($rows>0){ 
      //$respuesta="Existe el". $dni;
      while ($row = pg_fetch_row($result)) {
                
                $latv2= $row[0];
                $long = $row[1];
                $respuesta= "se encuentra en latitud: ".$latv2. " y longitud: ".$long;
  
        }
      
      }
        

    else{
      $respuesta ="no se encontraron resultados";
    }

?>
     <title>Life</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>		
		<script src="js/init.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
		<script type="text/javascript" src="controlador.js"></script>

		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>     
    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
				width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      /* html, body {
        height:100%;
        margin: 0;
        padding: 0;
      } */
</style>







  </head>
  <body>
    
		<!-- Header -->
		<div id="header">
			<div class="container"> 		
				<!-- Logo -->
				<div id="logo">
					<h1><a href="#">Life Pagina de Busqueda</a></h1>				
				</div>
				
			</div>
		</div>

		<!-- Main -->
		<div id="main">
			<div class="container" >
				<div class="row" > 

					<!-- Sidebar -->
					 <div id="sidebar" class="4u" ng-controller="mostrarCtrl">
						<section>
							<header>
								<h2>Iniciar busqueda</h2>
								<form action="prueba.php" method="get">
								<input type="text"  name="dni" class="form-control input-sm"  
								placeholder="Ingresa n° DNI" />
								<button type="checkbox" class="btn btn-primary btn-sm" type="submit"> Buscar
								 </button>
								</form>
								<br>
								<br>
							</header>
							
						</section>
					</div> 
					
					<!-- Content -->
					<div id="content" class="8u skel-cell-important">
						<section>
							<header>
								<h2>Ubicacion GPS</h2>
                <span class="byline">La persona identificada con el DNI: <?php echo $dni.", ".$respuesta ;?>
                 </span>
							</header>
							 <div id="map"></div> 
							
						</section>
					</div>
					

					
				</div>
			</div>

    <!-- <div id="map"></div> -->
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 19,
          center: new google.maps.LatLng(<?php echo $latv2. ','. $long;?>),
          mapTypeId: 'terrain'
        });
          var latLng = new google.maps.LatLng(<?php echo $latv2. ','. $long;?>);
          var marker = new google.maps.Marker({
            position: latLng,
            map: map
          });
        // Create a <script> tag and set the USGS URL as the source.
        
      }

      // Loop through the results array and place a marker for each
      // set of coordinates.
    
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH35Y-rjYEcehtskethAx7aH1A5H8mT5E&callback=initMap">
</script>
		

		


	

		<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
			</div>
		</div>
  </body>
</html>
