<?php
    include("../connect.php");
	include("../database/db.php");
	include("../database/config.php");
	
	$db = new Database;
	$id = $_GET['id'];
	$sql = "DELETE FROM `order` WHERE `order_id` = '$id'";
   
    $res = $db->delete($sql);
    header('location:danhsachdonhang.php');
	
?>