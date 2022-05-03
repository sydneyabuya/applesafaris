<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
require_once("db_connect.php");

$username =$choice= $password = "";


/*
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $link->prepare('SELECT first_name,second_name,email,`password`,choice FROM user WHERE id = ?');
// In this case we can use the user ID to get the user info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($firstname,$secondname,$email,$password,$choice);
$stmt->fetch();
$stmt->close();
*/

/* prepare statement */
if ($stmt = mysqli_prepare($link, "SELECT first_name,second_name,email,`password`,choice FROM user WHERE id = ?")) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    /* bind variables to prepared statement */
    mysqli_stmt_bind_result($stmt, $firstname,$secondname,$email,$password,$choice);

    /* fetch values */
    mysqli_stmt_fetch($stmt);
    
    /* close statement */
    mysqli_stmt_close($stmt);
}
/* close connection */
mysqli_close($link);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style type="text/css">

     .navtop {
	background-color: rebeccapurple;
	height: 60px;
	width: 100%;
    border: 0;
    position: fixed;
    }
    .navtop div {
	display: flex;
	margin: 0 auto;
	width: 1000px;
	height: 100%;
    }
    .navtop div h1, .navtop div a {
	display: inline-flex;
	align-items:center;
    }
    .navtop div h1 {
	flex: 1;
	font-size: 24px;
	padding: 0;
	margin: 0;
	color: #eaebed;
	font-weight: normal;
    }
    .navtop div a {
	padding: 0 20px;
	text-decoration: none;
	color: #c1c4c8;
	font-weight: bold;
    }
    .navtop div a i {
	padding: 2px 8px 0 0;
    }
    .navtop div a:hover {
	color: #eaebed;
    }
    body.loggedin {
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='26' viewBox='0 0 32 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14 0v3.994C14 7.864 10.858 11 7 11c-3.866 0-7-3.138-7-7.006V0h2v4.005C2 6.765 4.24 9 7 9c2.756 0 5-2.236 5-4.995V0h2zm0 26v-5.994C14 16.138 10.866 13 7 13c-3.858 0-7 3.137-7 7.006V26h2v-6.005C2 17.235 4.244 15 7 15c2.76 0 5 2.236 5 4.995V26h2zm2-18.994C16 3.136 19.142 0 23 0c3.866 0 7 3.138 7 7.006v9.988C30 20.864 26.858 24 23 24c-3.866 0-7-3.138-7-7.006V7.006zm2-.01C18 4.235 20.244 2 23 2c2.76 0 5 2.236 5 4.995v10.01C28 19.765 25.756 22 23 22c-2.76 0-5-2.236-5-4.995V6.995z' fill='%239C92AC' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
    }
    .content {
	width: 1000px;
	margin: 0 auto;
    }
    .content h2 {
	margin: 0;
	padding: 25px 0;
	font-size: 22px;
	border-bottom: 1px solid #e0e0e3;
	color: #4a536e;
    }
    .content > p, .content > div {
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
    }
    .content > p table td, .content > div table td {
	padding: 5px;
    }
    .content > p table td:first-child, .content > div table td:first-child {
	font-weight: bold;
	color: #4a536e;
	padding-right: 15px;
    }
    .content > div p {
	padding: 5px;
	margin: 0 0 10px 0;
    }
        </style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
            <h1>APPLE SAFARIS HOTEL</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
                <tr>
						<td>ID:</td>
						<td><?=print("".$email."\n");?></td>
					</tr>

                    <tr>
						<td>First Name:</td>
                        <td><?= printf("",$firstname);?></td>
                        
                    </tr>
                    
                    <tr>
						<td>Second Name:</td>
						<td><?=$secondname?></td>
                    </tr>
                    
                    <tr>
						<td>Email:</td>
						<td><?=$email?></td>
                    </tr>
                    
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['username']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Choice:</td>
						<td><?=$choice?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>