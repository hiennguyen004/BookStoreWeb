<?php
    include("header.php");
    include("nav.php");
	include("../database/config.php");
	include("../database/db.php");
?>
    <?php
		$db = new Database;
        $masach = $_GET['id'];
        $sql="select * from books where book_id='$masach';";
        $result = $db -> select($sql);
        $sanPham = mysqli_fetch_assoc($result);
    ?>
	<style>
        /* Căn giữa phần chữ và ô cho "Thông tin sản phẩm" */
        .information--product {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            text-align: center; /* Căn giữa văn bản */
        }

        /* Định dạng tiêu đề "Thông tin sản phẩm" */
        .information--product--title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Định dạng đoạn văn bản mô tả sản phẩm */
        .information--product p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        /* Căn giữa hình ảnh và thông tin sản phẩm */
        .details-product {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;  /* Khoảng cách giữa ảnh và thông tin */
            margin-top: 20px;
        }

        /* Định dạng ô nhập số lượng và nút thêm vào giỏ hàng */
        .detail--prodcut--itemp--amount, .detail--prodcut--itemp--buy {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        /* Cải thiện kiểu nút "Thêm vào giỏ hàng" */
        .detail--prodcut--itemp--buy input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .detail--prodcut--itemp--buy input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    <h1>Chi Tiết Sản Phẩm</h1>
    <section class="details-product">
        <img width="400" height="500" src="../img/<?php echo $sanPham['book_cover'];?>" alt="" class="details--product--img">
        <form action="xulythemvaogiohang.php?masanpham=<?php echo $sanPham["book_id"];?>" method="post">
            <section class="detail--product--item">
                <input type="text" name="masach" id="" value="<?php echo $sanPham['book_id'];?>" style="display:none;" readonly> 
                
                <h3 class="detail--prodcut--itemp--name">
                    <?php echo "Tên sản phẩm: ".$sanPham['title'];?>
                </h3>
                <h4 class="detail--prodcut--itemp--price">
                    <?php echo "Giá sản phẩm: ".$sanPham['price']."vnđ";?> 
                    <br>
                    <?php echo "Tồn kho: ".$sanPham['available'];?>
                </h4>
                <section class="detail--prodcut--itemp--amount">
                    <label for="price">Số lượng:</label>
                    <input type="number" name="soluong" id="price" value="1" min="1">
                </section>
                <section class="detail--prodcut--itemp--buy">
                    <input type="submit" value="Thêm vào giỏ hàng">
                </section>
            </section>
        </form>
    </section>

    <br>
    <section class="information--product">
        <h2 class="information--product--title">Thông tin sản phẩm</h2>
        <p>
            <?php echo $sanPham['descri'];?>
        </p>
    </section>
    
<?php
    include("footer.php");
?>
