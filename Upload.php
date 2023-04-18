<?php
require_once('header.php');

if (isset($_FILES['user_image'])) {
	$user_image = $_FILES['user_image']['name'];
	$user_image_tmp = $_FILES['user_image']['tmp_name'];
	move_uploaded_file($user_image_tmp, "user_images/$user_image");

	echo "File uploaded successfully";
}

require_once('footer.php');
?>