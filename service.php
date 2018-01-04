<?php
include('db_conection.php');

echo $_GET["dni"];
$dni= $_GET["dni"];
$lati= $_GET["lati"];
$lon= $_GET["lon"];
echo $_GET["lati"];
echo $_GET["lon"];


$res = pg_query($dbconnect, "SELECT * from location where id_user = '$dni'");
$rows = pg_num_rows($res);
if($rows>0)
{
   $ry=pg_query($dbconnect,"UPDATE  location SET lat_user='$lati',lon_user='$lon'
   WHERE id_user='$dni'");
    echo "update";
}
else{
$rs=pg_query($dbconnect,"INSERT INTO location (id_user, lat_user, lon_user) 
VALUES ('$dni', '$lati',  '$lon')");
    echo "insert";

}




?>


