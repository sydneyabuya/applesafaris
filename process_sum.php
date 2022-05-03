<?php

if(isset($_POST['submit'])) 
{
function add_number(int $num1,int $num2){
	$num1=$_POST["num1"];
	$num2=$_POST["num2"];
	 return $num1+$num2;
	
	echo $num1."+".$num2. "=". $sum."<br>";
}

echo add_number($num1,$num2) ;
}
?>