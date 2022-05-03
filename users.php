<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our Users</title>
    <style>
                    *{
        margin: 0;
        padding: 0;
    }
body{
    background-image: url("images/splash15.jpg");
    background-size: cover;
    background-position: center;
    font: 22px sans-serif; 
			text-align: center;

}
table,td,th{
    padding: 5px;
    border-collapse: collapse;
    width: 1000px;
    font-family: monospace;
    background-color: grey;
    text-align: left;
    border: 1px solid black;
}
.user{
    margin-left: 0;
}
th{
    background-color: #588c7e;
    color: white;
    
}
tr:nth-child(even){
    background-color: #f2f2f2;
}
.omg{
    box-sizing: border-box;
    width: 500px; padding: 20px;
        
    /* //background-color: #ffffff; */
    
    margin: 10px ; 
}
.menu {
    margin: 100px;
    width: 100%;
}
.whole{
    margin: 20px;
    border: 2px solid red;
    margin-left: 300px;
}
.sidebar{
    position: fixed;
    width: 300px;
    top:0;
    left: 0;
    bottom: 0;
    background-color: brown;
    padding-top: 50px;
    list-style: none;
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
                    <li><a href="users.php" class="menu-items">Users</a></li>
                    <li><a href="logout.php" class="menu-items">Logout</a></li>
                </ul>
            </li>
        </ul>
</div>
<div class="whole">
	    <div class="omg">
	    <table class="user">
		<h1>DATA ON USERS</h1>
		<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Email</th>
			<th>Username</th>
            <th>Password</th>
            <th>Choice</th>
		</tr>


<?php
$sql = "SELECT id,first_name,second_name,email, username, `password`,choice FROM user";

$result = mysqli_query($link, $sql);

   if(! $result ) {
      die("Could not get data: ".mysqli_error($link));
   }
   
   while($row = mysqli_fetch_assoc($result)) {
      echo "
      		<tr>
                  <td>".$row["id"]. "</td>
                  <td>".$row["first_name"]. "</td>
                  <td>".$row["second_name"]. "</td>
                  <td>".$row["email"]. "</td>
      			<td>" .$row["username"]. "</td>
                  <td>".$row["password"] . "</td>
                  <td>".$row["choice"]. "</td>
      		</tr>" ;
   }
   
   echo "Fetched data successfully\n";
   
  // mysqli_close($link);
?>
		</table>
        </div>
</div>
</body>
</html>