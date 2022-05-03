<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Food</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
		 body{ font: 14px sans-serif;
            background-image: url("images/splash3.jpg");
            background-size: contain;
		 }
		 .update_food{ 
            width: 350px; padding: 20px; 
            width: 400px;
  	        background-color: #ffffff;
  	        box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	        margin: 100px auto;
        }
	</style>
</head>
<body>
	<div class="update_food">
		<form action="process_updatefood.php" method="post" enctype="multipart/form-data">

		<h1>Change FOOD</h1>

        <label for="">Food id</label>
            <input type="text" name="food_id" id="food_id" class="form-control"><br><br>

		    <label for="">Food Item</label>
            <input type="text" name="food_item" id="food_item" class="form-control"><br><br>

            <label for="">Food Price</label>
            <input type="text" name="food_price" id="food_price"><br><br>

            <label for="">Type of food</label>
            <input type="text" name="food_type" id="food_type"><br><br>

            <label for="">Upload Image</label>
            <input type="file" name="food_image" id="food_image" value="food_image"><br><br>

            <input type="submit" class="btn btn-primary" name="SubmitImage" value="Update Food">
		<input type="submit" name="back" value="BACK" class="btn btn-primary"><br>
	
		</form>
	</div>
</body>

</html>

