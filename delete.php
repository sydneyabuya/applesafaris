<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="registration.css">
	<style>
		form{
			margin: 100px;
			background-color: white;
			text-align: center;
			
		}
	</style>
</head>
<body>
	<form action="process_register.php" method="post">

		<h1>DELETE User by using id</h1>
	<fieldset>
		
		<label for="id">User ID</label><br>
		<input type="text" name="id" id="user_id"><br><br>


	
		<input type="submit" name="delete" value="DELETE"><br>
		

	</fieldset>
	</form>

</body>

</html>