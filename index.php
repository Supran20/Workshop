<?php
//include auth_session.php file on all user panel pages
include("../../auth/auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Our Team</title>
	<style type="text/css">
		img{
			height:50px;
			width:50px;
		}
	</style>
</head>
<body>
<a href="../dashboard.php"> Dashboard</a><br>
<a href="add.php"> Add Team</a>


<h1>Team Table</h1>
<table border="1">
	<thead>
		<tr>
			<th>S.N.</th>
			<th>Title</th>
			<th>Description</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		include("../../config/db_config.php");
		$listData = mysqli_query($connection, "SELECT * FROM team ORDER BY id DESC");
		$i = 1;
		while($value = mysqli_fetch_array($listData)){
			$imagePath = "../../image/team/".$value['image'];
		echo "<tr>";
		echo "<td>".$i++."</td>";
		echo "<td>".$value['title']."</td>";
		echo "<td>".$value['description']."</td>";
		echo "<td><img src=".$imagePath."></td>";
		echo "<td><a href='edit.php?id=$value[id]'>Edit</a> || <a href='delete.php?id=$value[id]'>Delete</a></td>";
		echo "</tr>";
		}
		?>
		
	</tbody>
</table>

</body>
</html>