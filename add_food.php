<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Food</title>
        <style>
            *{
        margin: 0;
        padding: 0;
    }
.menu{
    box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
    margin:100px ;
    padding: 20px;
    margin-left: 300px;
}
body{
    background-image: url("images/splash10.jpg");
    background-size: cover;
    font: 22px sans-serif; 
	text-align: center;
}
.sidebar{
    position: fixed;
    width: 300px;
    top:0;
    left: 0;
    bottom: 0;
    background-color: brown;
    padding-top: 50px;
}
.sidebar h1{
    display: block;
    text-decoration: none;
    color: white;
    padding: 10px 20px;
    letter-spacing: 2px;
    font-family: "Rubik";
}
.sidebar a{
    display: block;
    text-decoration: none;
    color: white;
    padding: 10px 20px;
    letter-spacing: 2px;
    font-family: "Rubik";
}
.sidebar a:hover{
    margin-left: 20px;
    transition: 0.4s;
    color: rebeccapurple;
}
        </style>
    </head>
    <body>
    <div class="sidebar">
        <h1>APPLE SAFARIS HOTEL</h1>
        <ul>
                <ul>
                    <li><a href="welcome.php" class="menu-items">Main</a></li>
                    <li><a href="edituser.php" class="menu-items">Update user</a></li>
                    <li><a href="delete.php" class="menu-items">Delete user</a></li>
                    <li><a href="menu-list.php" class="menu-items">Menu</a></li>
                    <li><a href="add_food.php" class="menu-items">Add food</a></li>
                    <li><a href="update_food.php" class="menu-items">Update food</a></li>
                    <li><a href="users.php" class="menu-items">Users</a></li>
                    <li><a href="view_order.php" class="menu-items">Orders</a></li>
                </ul>
            </li>
        </ul>
    </div>

        <form action="process_food.php" method="post" enctype="multipart/form-data">
            <div class="menu">
                <h1>Add Food</h1><br>
            <label for="">Food Item</label>
            <input type="text" name="foot_item" id="food_item" class="form-control"><br><br>

            <label for="">Food Price</label>
            <input type="text" name="food_price" id="food_price"><br><br>

            <label for="">Type of food</label>
            <input type="text" name="food_type" id="food_type"><br><br>

            <label for="">Upload Image</label>
            <input type="file" name="food_image" id="food_image"><br><br>

            <input type="submit" class="btn btn-primary" name="SubmitImage" value="Add Food">
            </div>
        </form>
    </body>
</html>