<?php 
    include("header.php");
    include("../database/config.php");
    include("../database/db.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập - Tiệm sách Online</title>
    <style>
        body {
            margin: 0; padding: 0;
            font-family: Arial, Tahoma, sans-serif;
            background-color: white;
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main-title {
            font-size: 60px;
            font-weight: bold;
            margin-bottom: 50px; 
            text-transform: uppercase;
            color: black;
        }

        input[type="text"], input[type="password"] {
            width: 400px;
            height: 50px;
            border: 2px solid black;
            border-radius: 50px;
            padding-left: 20px;
            font-size: 20px;
            outline: none;
            margin-bottom: 20px;
        }

        label {
            font-size: 24px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .btn-login {
            width: 425px;
            height: 50px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-login:hover { background-color: #555; }

        .warning {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1 class="main-title">Tiệm sách Online</h1>

    <form name="frmLogin" action="" method="post">
        <label for="taiKhoan">Tài khoản:</label>
        <input type="text" id="taiKhoan" name="taiKhoan" placeholder="Nhập tài khoản...">
        
        <label for="matKhau">Mật khẩu:</label>
        <input type="password" id="matKhau" name="matKhau" placeholder="Nhập mật khẩu...">
        <br>

        <input type="submit" class="btn-login" value="Đăng nhập"><br>

        <h3>Chưa có tài khoản?</h3>
        <a href="dangki.php" style="color: black; font-weight: bold; text-decoration: underline;">Đăng ký ngay</a>
    </form>

    <?php
        if(isset($_POST['taiKhoan']) && isset($_POST['matKhau'])){
            $userName = $_POST['taiKhoan'];
            $passWord = $_POST['matKhau'];

            $db = new Database;
            $sql = "SELECT * from users where `username` = '$userName' and `password` = '$passWord'";
            $result = $db->select($sql);
            if ($result->num_rows > 0) {
                session_start();
                $_SESSION["tendangnhap"] = $userName;
                header('location: index.php');
            }
            else if($userName == 'admin' && $passWord == '1234' ){
                session_start();
                $_SESSION["tendangnhap"] = 'admin';
                header('location: ../admin/index_admin.php');
            }
            else {
                echo "<p class='warning'>Tên đăng nhập hoặc mật khẩu không hợp lệ</p>";
            }
        }
    ?>

<?php
    include("footer.php");
?>
</body>
</html>
