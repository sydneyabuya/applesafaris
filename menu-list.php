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
        <title>The Menu</title>
        <style>
                *{
        margin: 0;
        padding: 0;
    }
		body{ font: 22px sans-serif; 
			text-align: center;
            background-color: plum;
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
    float: left;
    padding: 0 20px;
}
header ul{
    float: left;
}
header ul li{
    float: left;
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
table{
    margin-left: 400px;
    border-collapse: collapse;
    border: 2px solid black;
    width: 800px;
}
table td{
    padding: 10px;
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
    <form action="process_menulist.php" method="post" enctype="multipart/form-data">
    <header class="header">
        <p>APPLE SAFARIS HOTEL</p>
        <ul>
            <li><a href="#" class="menu-items">HOME</a></li>
            <li><a href="#" class="menu-items">PRODUCTS</a></li>
            <li><a href="#" class="menu-items">ABOUT</a></li>
            <li><a href="#" class="menu-items">CONTACTS</a></li>
            <li> <a><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
            <li><a href="#" class="menu-items">MORE |</a>
                <ul>
                    <li><a href="profile.php" class="menu-items">Profile</a></li>
                    <li><a href="edituser.php" class="menu-items">Update user</a></li>
                    <li><a href="delete.php" class="menu-items">Delete user</a></li>
                    <li><a href="add_food.php" class="menu-items">Add food</a></li>
                    <li><a href="update_food.php" class="menu-items">Update food</a></li>
                    <li><a href="users.php" class="menu-items">Users</a></li>
                    <li><a href="welcome.php" class="menu-items">My Account</a></li>
                    <li><a href="logout.php" class="menu-items">Logout</a></li>
                </ul>
            </li>
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
                    <li><a href="users.php" class="menu-items">Users</a></li>
                    <li><a href="logout.php" class="menu-items">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="menu">
        <h1>Apple Safaris Food Menu</h1>
        <h2>Drinks</h2>
        <?php
            require_once("db_connect.php");

            $res= mysqli_query($link,"select * from food where food_type='Drinks'");
            echo "<table>";
            
            while($row=mysqli_fetch_array($res)){
                echo"<tr>";
                echo "<td>"; echo $row["food_id"] ;echo "</td>";
                echo "<td>";?> <img src="<?php echo $row["food_image"];?>" height="100" width="100"><?php echo "</td>";
                echo "<td>"; echo $row["food_item"] ;echo "</td>";
                echo "<td>"; echo $row["food_price"] ;echo "</td>";
                echo "<td>"
                ?>
                <input type="submit" name="update_food" value="update">
                <input type="submit" name="delete_food" value="delete">
                
                <?php
                echo "</td>";
                echo"</tr>";
            }
        
            echo "</table>";
        ?>
        </div>

        <div class="menu">
        <h3>Snacks</h3>
        <?php


            require_once("db_connect.php");

            $res= mysqli_query($link,"select * from food where food_type='Snack'");
            echo "<table>";
            
            while($row=mysqli_fetch_array($res)){
                echo"<tr>";
                echo "<td>"; echo $row["food_id"] ;echo "</td>";
                echo "<td>";?> <img src="<?php echo $row["food_image"];?>" height="200" width="400"><?php echo "</td>";
                echo "<td>"; echo $row["food_item"] ;echo "</td>";
                echo "<td>"; echo $row["food_price"] ;echo "</td>";
                echo "<td>";
                ?>
                <input type="submit" name="update_food" value="update">
                <input type="submit" name="delete_food" value="delete">
                <?php
                echo "</td>";
                echo"</tr>";
            }
        
            echo "</table>";
        ?>
        </div>
    </div>
    </form>
    </body>
</html>