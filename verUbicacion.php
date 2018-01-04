<?php

include('db_conection.php');
$rs=mysqli_query($dbconnect,"select * from location ");
$objLocation = new stdClass();
$listaLocations=[];

while($row= mysqli_fetch_array($rs,MYSQL_ASSOC))
{
    //echo $row['id_user'];
    $location=new stdClass();
    $location->user=$row['id_user'];
    $location->lati=$row['user_lati'];
    $location->long=$row['user_lon'];

    $listaLocations[]=$location;

    // echo ("hola");
}
$objLocation->listalocations=$listaLocations;
mysqli_close($dbconnect);

    echo json_encode($objLocation);
    
?>