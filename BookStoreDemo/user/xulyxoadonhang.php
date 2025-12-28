<?php
	include("../connect.php");
	include("../database/db.php");
	include("../database/config.php");
    session_start();
    $tendangnhap = $_SESSION["tendangnhap"];
    $id = $_GET['id'];
    $sql="delete from `cart` where `book_id` = '$id' and `user_name` = '$tendangnhap';";
    // echo $sql;
    $db = new Database;
	$res = $db ->delete($sql);
    header('location:cart.php');
?>