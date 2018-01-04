<?php
$dbhost='localhost';
$dbport='5432';
$dbuser='postgres';
$dbpass='1234';
$database='service_Life';
$dbconnect = pg_connect("host=localhost port=5432 dbname=service_Life user=postgres password=1234")
 or die ("Could not connect");

 ?>
    