<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
		 body{ font: 14px sans-serif;
            background-image: url("data:image/svg+xml,%3Csvg width='32' height='26' viewBox='0 0 32 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14 0v3.994C14 7.864 10.858 11 7 11c-3.866 0-7-3.138-7-7.006V0h2v4.005C2 6.765 4.24 9 7 9c2.756 0 5-2.236 5-4.995V0h2zm0 26v-5.994C14 16.138 10.866 13 7 13c-3.858 0-7 3.137-7 7.006V26h2v-6.005C2 17.235 4.244 15 7 15c2.76 0 5 2.236 5 4.995V26h2zm2-18.994C16 3.136 19.142 0 23 0c3.866 0 7 3.138 7 7.006v9.988C30 20.864 26.858 24 23 24c-3.866 0-7-3.138-7-7.006V7.006zm2-.01C18 4.235 20.244 2 23 2c2.76 0 5 2.236 5 4.995v10.01C28 19.765 25.756 22 23 22c-2.76 0-5-2.236-5-4.995V6.995z' fill='%239C92AC' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
		 }
		 .edit_user{ 
            width: 350px; padding: 20px; 
            width: 400px;
  	        background-color: #ffffff;
  	        box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	        margin: 100px auto;
        }
	</style>
</head>
<body>
	<div class="edit_user">
		<form action="" method="post">

		<h1>Change of details</h1>

		<table>
		<tr>
			<td>User type</td>
		<td>
			<select name="choice">
				<option value="-1">select user type</option>
				<option value="Admin">Admin</option>
				<option value="Client">Client</option>
				<option value="Waiter">Waiter</option>
				<option value="Chef">Chef</option>
				<option value="Cashier">Cashier</option>
			</select>
		</td>
		</tr>
		</table><br>
		<label for="id">User ID</label><br>
		<input type="text" name="id" id="user_id" class="form-control"><br><br>


		<label for="fname">First Name</label><br>
		<input type="text" name="firstname" id="fname" class="form-control"><br><br>

		<label for="sname">Second Name</label><br>
		<input type="text" name="secondname" id="sname" class="form-control"><br><br>

		<label for="email">email</label><br>
		<input type="text" name="email" id="email" class="form-control"><br><br>

		<label for="username">username</label><br>
		<input type="text" name="username" id="username" class="form-control"><br><br>

		<label for="pwd">password</label><br>
		<input type="password" name="password" id="pwd" class="form-control"><br><br>

		<input type="submit" name="edit" value="EDIT" class="btn btn-primary">
		<input type="submit" name="back" value="BACK" class="btn btn-primary"><br>
	
		</form>
	</div>
</body>

</html>

<?php

require_once("db_connect.php");

if (isset($_POST['edit'])){
	$id=$_POST['id'];
	$choice=$_POST['choice'];
	$firstname=$_POST["firstname"];
	$secondname=$_POST["secondname"];
	$email=$_POST["email"];
	$username=$_POST["username"];
	$password=$_POST["password"];

$update="UPDATE user SET first_name='$firstname',second_name='$secondname',email='$email',username='$username',`password`='$password',choice='$choice' WHERE id='$id'";

if (mysqli_query($link,$update,$resultmode = MYSQLI_STORE_RESULT)){
	echo "Record Updated successfully";
	header("location:welcome.php");
}
else{
	echo "Record not updated".mysqli_error($link);
}
}

if (isset($_POST['back'])){
	header("location:welcome.php");
}
?>