
<?php

require_once("db_connect.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Table From Database</title>
	<style type="text/css">

		table{
			
			border-collapse: collapse;
			width: 30%;
			font-family: monospace;
			background-color: grey;
			text-align: left;
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

		}
		

	</style>
</head>
<body>
	<div class="omg">
	<table>
		<h1>DATA ON USERS</h1>
		<tr>
			<th>id</th>
			<th>username</th>
			<th>password</th>
		</tr>


<?php
$sql = "SELECT id, username, `password` FROM user";

$result = mysqli_query($link, $sql);

   if(! $result ) {
      die("Could not get data: ".mysqli_error($link));
   }
   
   while($row = mysqli_fetch_assoc($result)) {
      echo "
      		<tr>
      			<td>".$row["id"]. "</td>
      			<td>" .$row["username"]. "</td>
      			<td>".$row["password"] . "</td>
      		</tr>" ;
   }
   
   echo "Fetched data successfully\n";
   
   mysqli_close($link);
?>
		</table>
	</div>
	</body>
</html>