<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
        body{ font: 14px sans-serif;
			background-image: url("data:image/svg+xml,%3Csvg width='32' height='26' viewBox='0 0 32 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14 0v3.994C14 7.864 10.858 11 7 11c-3.866 0-7-3.138-7-7.006V0h2v4.005C2 6.765 4.24 9 7 9c2.756 0 5-2.236 5-4.995V0h2zm0 26v-5.994C14 16.138 10.866 13 7 13c-3.858 0-7 3.137-7 7.006V26h2v-6.005C2 17.235 4.244 15 7 15c2.76 0 5 2.236 5 4.995V26h2zm2-18.994C16 3.136 19.142 0 23 0c3.866 0 7 3.138 7 7.006v9.988C30 20.864 26.858 24 23 24c-3.866 0-7-3.138-7-7.006V7.006zm2-.01C18 4.235 20.244 2 23 2c2.76 0 5 2.236 5 4.995v10.01C28 19.765 25.756 22 23 22c-2.76 0-5-2.236-5-4.995V6.995z' fill='%239C92AC' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
		 }
        .regist{
             padding: 20px;
             width: 400px;
  	        background-color: #ffffff;
  	        box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	        margin: 100px auto; 
            }
    </style>
</head>
<body>

	<div class="regist">
		<form action="process_register.php" method="post">
			<h1>REGISTRATION</h1>

		<table>
			<tr><td>User type</td><td>
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

		<label for="fname">First Name : *</label><br>
		<input type="text" name="firstname" id="fname" class="form-control">Enter firstname<br><br>

		<label for="sname">Second Name</label><br>
		<input type="text" name="secondname" id="sname" class="form-control"><br><br>

		<label for="email">Email</label><br>
		<input type="text" name="email" id="email" class="form-control"><br><br>

		<label for="username">Username</label><br>
		<input type="text" name="username" id="username" class="form-control"><br><br>

		<label for="pwd">Password</label><br>
		<input type="text" name="password" id="password" class="form-control"><br><br>
			
		<input type="submit" class="btn btn-primary" name="register" value="REGISTER">
		<input type="submit" class="btn btn-primary" name="back" value="BACK">
		<br><br>
		
		<?php
		if(isset($_POST['back'])){
			header("location:login.php");
		}
		?>
		<p>Would you like to change your Details?<a href="edituser.php">Change here now</a></p>
		<p>a link to my <a href="delete.php"> DELETE </a></p>
	
	
		</form>
	</div>
</body>

</html>
