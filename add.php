
<?php
//include auth_session.php file on all user panel pages
include("../../auth/auth_session.php");
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Slider Record</title>
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

<div class="container">
<h1>Add Team</h1>
<form method="POST" enctype="multipart/form-data">
	<label>Title</label><br>
	<input type="text" name="title" required placeholder="Please enter your title"><br>

	<label>Image</label><br>
	<input type="file" name="image_from_form" required><br>

	<label>Description</label><br>
	<textarea name="description" cols="50" rows="10" required>
	</textarea>
	<br>
	<input type="submit" name="submit" value="SUBMIT">
	</form>
</div>

<?php
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];

	$filename = $_FILES["image_from_form"]["name"];
    $tempname = $_FILES["image_from_form"]["tmp_name"];
    $folder = "../../image/team/" . $filename;

	include("../../config/db_config.php");


	$insert = mysqli_query($connection, "INSERT INTO team(title, description, image, created_at) VALUES ('$title', '$description', '$filename',current_timestamp())");
	move_uploaded_file($tempname, $folder);
	if ($insert) {
		header('Location:index.php');
	}


}


?>


</body>
</html>