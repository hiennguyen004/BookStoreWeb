<style>
        /* Cấu hình chung cho body và html */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Header */
        .header {
            width: 100%;
            background-color: #f8f8f8;
        }

        .header--sec {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: center;
            background-color: #fff;
        }

        .header--sec--logo img {
            width: 200px;
            height: auto;
        }

        .header--sec--search input[type="text"] {
            padding: 8px;
            margin-right: 10px;
            width: 200px;
        }

        .header--sec--search input[type="submit"] {
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .header--sec--temp {
            display: flex;
            gap: 20px;
        }

        .header--sec--temp a {
            text-decoration: none;
            color: #333;
        }

        .header--sec--temp a:hover {
            color: #4CAF50;
        }

        /* Navbar */
        .nav {
            display: flex; /* Dàn các mục theo hàng ngang */
            justify-content: space-around; /* Căn đều các phần tử */
            align-items: center; /* Căn giữa các phần tử theo chiều dọc */
            background-color: #f1f1f1;
            padding: 10px 0;
        }

        .nav--item {
            margin: 0 15px;
        }

        .nav--item a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }

        .nav--item a:hover {
            color: #4CAF50;
        }

        /* Căn giữa các mục */
        .nav--item i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <header class="header"> 
        <section class="header--sec">
            <div class="header--sec--logo">
                <a href="index.php"><img src="../img/lg.png" alt="Logo"></a>
            </div>
            <form class="header--sec--search" action="timkiemsanpham.php" method="post">
                <input type="text" name="tukhoa" placeholder="Tìm sản phẩm">
                <input type="submit" value="Tìm kiếm" class="search--submit">
            </form>
            <section class="header--sec--temp">
                <h3 class="login"><a href="taikhoan.php"><b><i class='bx bxs-user'></i>Trang cá nhân</b></a></h3>
                <h3 class="basket"><a href="cart.php"><b>Giỏ hàng</b><i class='bx bx-shopping-bag'></i></a></h3>
                <h3 class="basket"><a href="logout.php"><b>Đăng xuất</b></a></h3>
            </section>
        </section>

        <nav class="nav">
            <h3 class="nav--item"><a href="index.php"><i class='bx bxs-home'></i>Trang chủ</a></h3>
            <h3 class="nav--item"><a href="product.php"><i class='bx bx-menu'></i>Sản phẩm</a></h3>
        </nav>
    </header>

    <!-- Thêm khoảng trống để phần nội dung không bị che bởi header -->
    <div style="margin-top: 140px;"></div>

</body>
