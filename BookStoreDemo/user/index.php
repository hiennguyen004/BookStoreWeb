<?php
    include("header.php");
    include("nav.php");
    include("../database/config.php");
    include("../database/db.php");
?>
    <style>
	/* Slide ảnh căn giữa */
	.slide {
		display: flex;
		overflow: hidden;
		position: relative;
		justify-content: center;  /* Căn giữa slide */
		align-items: center;  /* Căn giữa theo chiều dọc */
		width: 80%;  /* Giới hạn chiều rộng của slide */
		margin: 0 auto;  /* Căn giữa slide */
	}

	.slide img {
		width: 100%;
		height: 500px;
		object-fit: cover;
	}

	/* Cấu trúc chung cho các phần sản phẩm */
	.content--itemProduct {
		display: grid;
		grid-template-columns: repeat(3, 1fr); /* Chia thành 3 cột đều */
		gap: 20px; /* Khoảng cách giữa các sản phẩm */
		justify-items: center; /* Căn giữa các sản phẩm */
		margin-top: 20px;
		max-width: 1200px; /* Giới hạn chiều rộng của phần chứa sản phẩm */
		margin-left: auto;
		margin-right: auto;
	}

	/* Định dạng các sản phẩm */
    .content--itemProduct {
        display: flex;         /* Kích hoạt Flexbox */
        flex-wrap: wrap;       /* Tự động xuống hàng khi hết chiều rộng */
        gap: 20px;            /* Khoảng cách giữa các sản phẩm */
        justify-content: center; /* Căn giữa các sản phẩm */
        padding: 20px;
    }

    .product {
        width: 250px;          /* Độ rộng cố định cho mỗi khối sản phẩm */
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        border-radius: 8px;
        background: #fff;
        transition: 0.3s;
    }

    .product:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .product img {
        max-width: 100%;       /* Ảnh không vượt quá khung */
        height: auto;          /* Giữ tỉ lệ ảnh */
        border-radius: 4px;
    }

    .nameProduct {
        margin: 10px 0;
        font-weight: bold;
        height: 40px;          /* Cố định chiều cao tên để các khung bằng nhau */
        overflow: hidden;
    }

    .price {
        color: #e44d26;
        font-weight: bold;
	}

	/* Cố định footer ở dưới cùng của trang */
	.footer {
		background-color: #f1f1f1;
		padding: 20px;
		position: relative;
		bottom: 0;
		width: 100%;
	}

	/* Căn giữa nội dung trong footer */
	.footer--address {
		text-align: center;
	}

	.footer--address--tilte {
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 15px;
	}

	.footer--copyright {
		text-align: center;
		font-size: 14px;
		margin-top: 20px;
		color: #333;
	}

	/* Đảm bảo trên màn hình nhỏ hơn, số cột giảm xuống */
	@media (max-width: 768px) {
		.content--itemProduct {
			grid-template-columns: 1fr; /* Chuyển sang 1 cột */
		}
	}

	/* Định dạng cho tiêu đề "Best seller" */
	.content--space {
		font-size: 32px; /* Tăng kích thước chữ */
		font-weight: bold; /* In đậm */
		text-align: center; /* Căn giữa */
		margin-bottom: 30px; /* Khoảng cách dưới tiêu đề */
		color: #333; /* Màu chữ */
	}

	/* Định dạng cho các sản phẩm nổi bật */
	.content--space i {
		font-size: 36px; /* Tăng kích thước icon nếu có */
	}

    </style>
	
        <section class="slide">
            <img  width="300" height="500" src="../img/z5768061127935_ffce9e0948bdc6f7a0260d5debfde0ac_5e83f9e368254a02b99ba5f0a25bebb8.jpg" alt="">  
            <img width="300" height="500" src="../img/review-cha-giau-cha-ngheo.jpg" alt="">
            <img width="300" height="500" src="../img/189789-combo-dac-nhan-tam-quang-ganh-lo-di-va-vui-song.jpg" alt=""> 
            <img width="300" height="500" src="../img/Nha-Gia-Kim-–-Cuon-sach-nho-ve-hanh-trinh-tim-kho-bau-lon-trong-moi-nguoi.jpg" alt=""> 
            <img width="300" height="500" src="../img/tuoi-tre-dang-gia-bao-nhieu-1.png" alt=""> 
        </section>
        
        <script>
            const imgPosition  = document.querySelectorAll(".slide img");
            const imgContainer = document.querySelector(".slide");
            let index =  0;
            let imgNumber = imgPosition.length;
            imgPosition.forEach(function(img,index){
                img.style.left = index*100+"%";
            })
            function imgSlide(){
                index++;
                if(index >= imgNumber){
                    index = 0;
                }
                imgContainer.style.left = "-" +index*100+"%";
            }
        </script>

        <h1 class="content--space">
            <i class='bx bx-gift'></i>Best seller
        </h1>

        <section class="content--itemProduct">
            <?php
				$db = new Database;
                $sql = 'SELECT * FROM `books` LIMIT 3';
                $res = $db ->select($sql);
                while($row = mysqli_fetch_array($res)){
            ?>
            <article class="product hightlight-product">
                <img  src="../img/<?php echo $row['book_cover'];?>" alt="">
                <h3 class="nameProduct"><a href="product2.php?id=<?php echo $row["book_id"]; ?>"><?php echo $row['title'];?></a></h3>
                <h4 class="price"><?php echo number_format($row['price'],0,",",".")." vnđ";?></h4>
            </article>
                        
            <?php 
                }
            ?>
        </section>

        <h1 class="content--space">
            <i class='bx bx-menu' ></i>Sản phẩm nổi bật
        </h1>

        <section class="content--itemProduct">
            <?php
                $sql = "SELECT * FROM `books` LIMIT 4";
                $res = $db ->select($sql);
                while($row = mysqli_fetch_array($res) ){
            ?>
            <article class="product">
                <img width="300" height="500" src="../img/<?php echo $row['book_cover'];?>" alt="">
                <h3 class="nameProduct"><a href="product2.php?id=<?php echo $row["book_id"]; ?>"><?php
                    echo $row["title"];
                ?></a></h3>
                <h4 class="price"><?php echo number_format($row['price'],0,",",".")." vnđ";?></h4>
            </article>
                        
            <?php 
                }
            ?>
        </section>

<?php
    include("footer.php");
?>  
