<?php
session_start();

require_once("db_connect.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if (isset($_POST['delete_food'])){

    // $user_name = $_SESSION['user'];

   $food_id = $_SESSION['food_id'];
	
	$sql="DELETE FROM food WHERE food_id = '$food_id'";
	
	if (mysqli_query($link,$sql)){
		echo "Record Deleted successfully";
	}
	else{
		echo "Record not deleted".$link->error;
	}
}

?>