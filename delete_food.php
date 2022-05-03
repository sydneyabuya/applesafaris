<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <link rel="stylesheet" type="text/css" >
    <style>
        body{
            background-color: plum;
        }
        form{
            margin: 150px;
            padding: 40px;
            background-color: white;
        }
    </style>
</head>
<body>
	<form action="process_register.php" method="post" enctype="multipart/form-data">

		<h1>DELETE Food</h1>
		<label for="id">FOOD Id</label><br>
		<input type="text" name="food_id" id="food_id" placeholder="food id"><br><br>

		<input type="submit" name="delete_food" value="DELETE Food"><br>
	
	</form>

</body>

</html>