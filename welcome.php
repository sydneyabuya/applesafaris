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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
		body{ font: 22px sans-serif; 
			text-align: center;
            background-image: url("images/splash6.jpg");
            background-size: cover;
		 }

header{
    position: fixed;
    width: 100%;
    height: 60px;
    background-color: rebeccapurple;
}
header p{
    font-family: Arial, Helvetica, sans-serif;
    color: #222;
    line-height: 55px;
    font-size: 24px;
    /* float: left; */
    float: right;
    padding: 0 20px;
}
header ul{
    /* float: left; */
    float: right;
    margin-right: 130px;
}
header ul li{
    /* float: left; */
    float: right;
    list-style: none;
    position: relative;
}
header ul li a{
    font-family: Arial, Helvetica, sans-serif;
    color: black;
    display: block;
    font-size: 14px;
    padding: 22px 14px;
    text-decoration: none;   
}
header ul li ul{
    display: none;
    position: absolute; 
    background-color: #ffffff;
    border-radius: 0 0 4px 4px;
}
header ul li:hover ul{
    display: block;
    
}
header ul li ul li{
    width: 180px;
    border-radius: 4px;
}
header ul li ul li a{
    padding: 8px 14px;
}
header ul li ul li a:hover{
    background-color: #f3f3f3;
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
    <header class="header">
        
        <ul>
            <li><a href="#" class="menu-items">MORE |</a>
                <ul>
                <li><a href="delete_food.php" class="menu-items">Delete Food</a></li>
                    <li><a href="logout.php" class="menu-items">Logout</a></li>
                </ul>
            </li>
            <li> <a><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
        </ul>
    </header>
    <div class="sidebar">
        <h1>APPLE SAFARIS HOTEL</h1>
        <ul>
                <ul>
                    <li><a href="profile.php" class="menu-items">Profile</a></li>
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

</body>
</html>

<?php

require_once("db_connect.php");

?>


</html>