<?php
    include("../connect.php");
	include("../database/db.php");
	include("../database/config.php");
	
	$db = new Database;
	$id = $_GET['id'];
	$sql = "DELETE FROM `users` WHERE `user_id` = '$id'";
   
    $res = $db->delete($sql);
    header('location:danhsachuser.php');
	
?>