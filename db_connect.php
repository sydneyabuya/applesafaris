<?php

$dbserver="localhost:3307";
$dbuser="root";
$password="";
$dbname="myhotel";

$link=mysqli_connect($dbserver,$dbuser,$password,$dbname);

if ($link) {
  echo "Connected successfully";
}
else{
	echo "Connection failed" .mysqli_connect_error();
}