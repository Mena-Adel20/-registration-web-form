<?php
require_once('header.php');

class DB_Module{

	function db_connect() {
		$servername = "localhost";
		$username = "root";
		$password = "1234567";
		$dbname = "user’s";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
	
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	
		return $conn;
	}

	function db_insert($conn, $full_name, $user_name, $birthdate, $phone, $address, $password, $user_image, $email) {
		$sql = "INSERT INTO `user’s` (full_name, user_name, birthdate, phone, address, password, user_image, email) VALUES ('$full_name', '$user_name', '$birthdate', '$phone', '$address', '$password', '$user_image', '$email')";
	
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

}

class Viwe_Module{
	function db_select($conn, $user_name) {
		$sql = "SELECT * FROM `user’s` WHERE user_name='$user_name'";
		$result = mysqli_query($conn, $sql);
	
		if (mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}
	}
}


class DB_controller{
	function execat(){
		$data_Module=new DB_Module();
		$view_Module= new Viwe_Module();
		$conn = $data_Module->db_connect();

		if (isset($_POST['submit'])) {
			$full_name = $_POST['full_name'];
			$user_name = $_POST['user_name'];
			$birthdate = $_POST['birthdate'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			$email = $_POST['email'];
		
			if ($password != $confirm_password) {
				echo "Passwords do not match";
			} else {
				$user_image = $_FILES['user_image']['name'];
				$user_image_tmp = $_FILES['user_image']['tmp_name'];
				move_uploaded_file($user_image_tmp, "user_images/$user_image");
		
				if ($view_Module->db_select($conn, $user_name)) {
					echo "Username already exists";
				} else {
					$password = password_hash($password, PASSWORD_DEFAULT);
					$data_Module->db_insert($conn, $full_name, $user_name, $birthdate, $phone, $address, $password, $user_image, $email);
				}
			}
		
			mysqli_close($conn);
		}

	}

	

}

$db_controller= new DB_controller();

$db_controller->execat();

require_once('footer.php');
?>