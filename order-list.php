<?php

session_start();

require_once("db_connect.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: welcome2.php");
    exit;
}

if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = "Invalid food item! Please try again!";
	header('location: welcome2.php');
	exit();
}


if (isset($_POST['order'])) {

$user_name = $_SESSION['username'];

$food_item=$_SESSION["food_item"];

$order_id = "RSTGF" . strval(mt_rand(100000, 999999));





$sql = "INSERT INTO orders(order_id,food_id,user_id) VALUES(?,?,?,?)";

$query  = $link->prepare($sql);

if ($query->execute([$order_id, $food_id, $user_id])) {

	$_SESSION['msg'] = 'Order Placed! Your Order ID is : '.$order_id;

	//header('location: welcome2.php');
	
} else {

	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

	//header('location: welcome2.php');

}
}
// SELECT orders.order_id,`user`.username,food.food_item,food.food_price 
// FROM ((orders
//        INNER JOIN `user` ON orders.user_id = `user`.id)
//       INNER JOIN food ON orders.food_id = food.food_id)