<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



require('db_connect.php');


if (isset($_REQUEST['id'])) {

	$sql = 'SELECT * FROM food WHERE food_id = "'.$_REQUEST['id'].'"';
	
} else {

	$sql = 'SELECT * FROM food';

}

// $query  = $link->prepare($sql);
// $query->execute();
// $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

$res= (mysqli_query($link,$sql));
  
if($row=mysqli_fetch_array($res)){
    echo "googd";
}

?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    body{ 
            font: 14px sans-serif; text-align: center;
            background-color: plum; 
        }
    .menu-items{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    margin: 0;
    padding:0;
    box-sizing: border-box;
}
.header{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: space-between;
    padding : 1rem 2rem;
    background-color: rebeccapurple;
    height: 55px;
}
.menu-items{
    list-style: none;
    display: flex;
    align-items: center;
}
.menu-items li a{
    font-size: 14px;
    padding:0.5em 1em;
    text-decoration: none;
    color: blanchedalmond;
}
.header p{
    font-size: 24px;
    color: black;
    margin: 20px;
    margin-top: 10px;
   
}
.header a:hover{
    background-color: green;
}
.rap{
    background-image: url("images/splash7.jpg");
    height: 500px;
    background-size: cover;
    background-position: center;
}
.customer{
    /*border: 2px solid red;*/
    padding: 150px;
}
.customer  h2{
    font-size: 50px;
    color: black;
    font-weight: bold;
    
}
.customer p{
    font-family: fantasy;
    font-size: 26px;
    color: rebeccapurple;
}
.menu{
    margin: 100px;
}
table,td{
    padding: 20px;
    border: 1px solid black;
    width: 1000px;
}
footer{
    margin-top: 300px;
    width: 100%;
    height: 350px;
    background-color:black;
}
   

footer p{
    color:white;
}
.followus{
    height: 50px;
    width: 350px;
    /*border: 2px solid green;*/
    margin-left: 295px;
    margin-top: -150px;
    text-align: center;
    text-decoration: underline;
    font-size: 23px;
}
.contactus{
    height: 130px;
    width: 350px;
    /*border: 2px solid yellow;*/
    margin-left: 850px;
    margin-top: -100px;
    text-align: center;
    text-decoration: underline;
    font-size: 20px;
}
.copyright{
    height: 100px;
    width: 100%;
    border-top: 2px solid white;
    margin-top: 50px;
    text-align: center;
    font-size: 20px;
}
.fa {
    padding: 20px;
    font-size: 30px;
    width: 50px;
    height: 30px;
    text-align: center;
    text-decoration: none;
    margin: 10px 100px;
    margin-left:-100px;
    /*margin-top: -200px;*/
    /*border: 2px solid red;*/
    display: inline-block;
    border-radius: 50%;
}
.fa:hover {
    opacity: 0.7;
}
.fa-facebook {
    background: #3B5998;
    color: white;
}
.fa-twitter {
    background: #55ACEE;
    color: white;
}
.fa-youtube {
    background: #bb0000;
    color: white;
}
.fa-instagram {
    background: #125688;
    color: white;
}
.whole{
    margin-left: 100px;
}

    </style>
    </head>

    <body>
    <header class="rap"> 
        <div class="header">
            <p>APPLE SAFARIS HOTEL</p>
            <ul class="menu-items">
                
                <li><a href="index.php" class="menu-items">HOME</a></li>
                <li><a href="#" class="menu-items">PRODUCTS</a></li>
                <li><a href="#" class="menu-items">ABOUT</a></li>
                <li><a href="#" class="menu-items">CONTACTS</a></li>
                <li><a href="profile.php" class="menu-items">PROFILE</a></li>
                <li> <a><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
                <li><a href="logout.php" class="menu-items">LOGOUT</a></li>
            </ul>
        </div>

        <div class="customer">
            <h2>Quality Food at your door</h2>
            <p>We deliver quality.Try us Win us.</p>
        </div>
    </header>
    <form action="order-list.php" method="post" enctype="multipart/form-data">
    <div class="menu">
        <h1>Apple Safaris Menu</h1>
        <h2>Drinks</h2>
        <form action="order-list.php" method="post" enctype="multipart/form-data">
        <?php
            require_once("db_connect.php");

            $res= mysqli_query($link,"select * from food where food_type='Drinks'");
            echo "<table>";
            
            while($row=mysqli_fetch_array($res)){
                echo"<tr>";
                echo "<td>";?> <img src="<?php echo $row["food_image"];?>" height="200" width="400"><br><br><?php echo "</td>";
                echo "<td>"; echo $row["food_item"] ;echo "</td>";
                echo "<td>"; echo $row["food_price"] ;echo "</td>";
                echo "<td>"
                ?>
                <input type="submit"  name="order" value="ORDER NOW">
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
                echo "<td>";?> <img src="<?php echo $row["food_image"];?>" height="200" width="400"><br><?php echo "</td>";
                echo "<td>"; echo $row["food_item"] ;echo "</td>";
                echo "<td>"; echo $row["food_price"] ;echo "</td>";
                echo "<td>"
                ?>
                <input type="submit"  name="order" value="ORDER NOW">
                <?php
                echo "</td>";
                echo"</tr>";
            }
        
            echo "</table>";

        //    // session_start();

        //     // $food_item=$row["food_item"];
        //     // $food_price =$row["food_price"];

        //     $_SESSION["$row[food_item]"]=$food_item;
        //     $_SESSION["food_price"]=$food_price;
        ?>
    </div>
    </form>
    <div class="whole">
	    <div class="omg">
            <table class="user">
                <h2>Order</h2>
            <tr>
                <th>Order id</th>
                <th>Username</th>
                <th>Food</th>
                <th>Price of the food</th>
                
            </tr>


<?php
$sql = "SELECT orders.order_id,`user`.username,food.food_item,food.food_price 
        FROM ((orders
       INNER JOIN `user` ON orders.user_id = `user`.id)
      INNER JOIN food ON orders.food_id = food.food_id) WHERE username='$_SESSION[username]'";

$result = mysqli_query($link, $sql);

   if(! $result ) {
      die("Could not get data: ".mysqli_error($link));
   }
   
   while($row = mysqli_fetch_assoc($result)) {
      echo "
      		<tr>
                  <td>".$row["order_id"]. "</td>
      			<td>" .$row["username"]. "</td>
                  <td>".$row["food_item"] . "</td>
                  <td>".$row["food_price"]. "</td>
      		</tr>" ;
   }
   
   echo "Fetched data successfully\n";
   
  // mysqli_close($link);
?>
		</table>
        </div>
    </div>

    <footer>
        <div class="followus">
			<p class="fus">FOLLOW US:</p>
		</div>
		<div class="">
			<a href="https://web.facebook.com/?_rdc=1&_rdr" class="fa fa-facebook"></a>
            <a href="https://twitter.com/" class="fa fa-twitter"></a>
            <a href="https://www.youtube.com/" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
		</div>
		<div class="contactus">
			<p class="cus">CONTACT US:</p>
			<p>0793333000</p>
			<p>applesafaris@gmail.com</p>
		</div>
		<div class="copyright">
			<p>All Rights Reserved</p>
			<p>&copy; 2020</p>
        </div>

    </footer>
    </body>
</html>

