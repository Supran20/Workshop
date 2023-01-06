<?php
include("../../auth/auth_session.php");
?>
<?php
if (isset($_POST['update'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$id = $_POST['team_id'];

	include("../../config/db_config.php");

	$filename = $_FILES["image_from_form"]["name"];
    $tempname = $_FILES["image_from_form"]["tmp_name"];
    $folder = "../../image/team/" . $filename;


	$update = mysqli_query($connection, "UPDATE team SET title='$title', description = '$description', image= '$filename',updated_at = current_timestamp() WHERE id = $id");
	move_uploaded_file($tempname, $folder);
	if ($update) {
		header('Location:index.php');
	}


}


?>