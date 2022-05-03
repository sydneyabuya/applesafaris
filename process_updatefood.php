<?php
session_start();

require_once("db_connect.php");

if(isset($_POST["SubmitImage"])){
    $food_id=$_POST["food_id"];
    $food_item=$_POST["food_item"];
    $food_price=$_POST["food_price"];
    $food_type=$_POST["food_type"];
    $food_image=$_FILES["food_image"];
   

    $original_file_name=$_FILES["food_image"]["name"];
    $file_tmp_location=$_FILES["food_image"]["tmp_name"];

    $file_path="images/".basename($original_file_name);

    /*if(move_uploaded_file($file_tmp_location, $file_path )){
        $sql= "INSERT INTO food(food_id,food_item,food_image,food_price,food_type) VALUES('','$food_item','$file_path','$food_price','$food_type')";*/

        if(move_uploaded_file($file_tmp_location, $file_path )){    
$update="UPDATE food SET food_item='$food_item',food_price='$food_price',food_type='$food_type',food_image='$file_path' WHERE food_id='$food_id'";

        if (mysqli_query($link,$update)){
            echo "Record Updated successfully";
                // Redirect to login page
               // header("location: view_menu.php");
                header("location: welcome.php");
        }
        else{
            echo "Record not inserted".$link->error;
        }
  
    }



if (isset($_POST['back'])){
	header("location:welcome.php");
}
}
?>