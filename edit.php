<?php 
session_start();

 include ("db.php");
$user_id = $_SESSION['id'];

if(!empty($_POST)){
	if(!empty($_POST['update'])){
		$sql = "UPDATE userslog SET user_name='".$_POST['user_name']."', password='".$_POST['password']."' WHERE user_id='". (int)$user_id . "'";
		mysqli_query($connect, $sql);
		   header('Location: account.php', true, 301);
}
}

	?>