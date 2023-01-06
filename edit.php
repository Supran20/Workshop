<?php
include("../../auth/auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Team Record</title>
	<style type="text/css">
		.container{
			background-color: grey;
			padding: 10px;
		}

		input[type=submit]{
			background-color:#3636c3;
			border:none;
			padding:5px;
			cursor: pointer;
			color: white;
		}

		input[type=submit]:hover{
			background-color:blue;
		}
	</style>
</head>
<body>
<a href="../dashboard.php"> Dashboard</a><br>
<a href="index.php"> Back</a>


<?php

$id = $_GET['id'];
include("../../config/db_config.php");
$result = mysqli_query($connection, "SELECT * FROM team WHERE id = $id");

while($data = mysqli_fetch_array($result)){
	$title  = $data['title'];
	$description = $data['description'];
	$imagePath = "../../image/team/".$data['image'];;
	$id = $data['id'];
}

?>

<div class="container">
<h1>Edit Team</h1>
<form method="POST" action="update.php" enctype="multipart/form-data">
	<input type="hidden" name="team_id" value="<?php echo $id?>">
	<label>Title</label><br>
	<input type="text" name="title" value="<?php echo $title?>" required placeholder="Please enter your title"><br>
	<label>Image</label><br>
	<input type="file" name="image_from_form" required><br>
	<img style="height:50px; height:50px;" src="<?php echo $imagePath ?>">
	<br>
	<label>Description</label><br>
	<textarea name="description" cols="50" rows="10" required><?php echo $description?>
	</textarea>
	<br>

	<input type="submit" name="update" value="UPDATE">
	</form>
</div>


</body>
</html>