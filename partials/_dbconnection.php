<?php
$username="root";
$server="localhost";
$password="";
$database="blooddonor";

$con= mysqli_connect($server, $username, $password, $database);

if(!$con){
    die("Sorry! We failed to connect:". mysqli_connect_error());
}
else{
    //echo "Connection was successful";
}


?>