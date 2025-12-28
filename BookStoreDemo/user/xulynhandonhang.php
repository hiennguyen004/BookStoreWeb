<?php
    include("../database/config.php");
	include("../database/db.php");
	include("../connect.php");
	$db = new Database;
    $id = $_GET['id'];
    $sql = "UPDATE `order` SET `rcdate`= CURRENT_DATE,`status`='Đã nhận' WHERE `order_id` = $id;";
    $res = $db-> update($sql);
    header('location: taikhoan.php');
?>