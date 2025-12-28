<?php
    include("header.php");
    include("nav.php");
?>

        <h1 class="dangKi">Đăng kí tài khoản</h1>
        <form action="xulylaptaikhoan.php" method="post">

            <h2 class="captionForm">Thông tin đăng kí</h2> 

            <h3 class="dangKi--item">
                <label for="">Tên</label><br>
                <input type="text" name="name"> 
            </h3>

            <h3 class="dangKi--item">
                <label for="">Số điện thoại</label><br>
                <input type="tel" name="phone_number" pattern="[0]{1}[39]{1}[0-9]{8}"> 
            </h3>

            <h3 class="dangKi--item">
                <label for="">Email</label><br>
                <input type="email" name="email"> 
            </h3>

            <h3 class="dangKi--item">
                <label for="">Tên đăng nhập</label><br>
                <input type="text" name="username"> 
            </h3>

            <h3 class="dangKi--item">
                <label for="">Mật khẩu</label><br>
                <input type="password" name="password"> 
            </h3>

            <input type="submit" class="submit" value="Đăng kí">
        </form>

<?php
    include("footer.php");
?>
