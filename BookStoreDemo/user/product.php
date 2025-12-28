<?php
    include("header.php");
    include("nav.php");
    include("../database/config.php");
    include("../database/db.php");
?>
<style>
    /* CSS để dàn sản phẩm hàng ngang */
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

    /* CSS cho phần phân trang */
    .pages {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 50px;
    }

    .pages a {
        padding: 8px 16px;
        margin: 0 5px;
        border: 1px solid #000;
        text-decoration: none;
        color: #000;
        border-radius: 4px;
    }

    .pages a:hover {
        background-color: #000;
        color: #fff;
    }
</style>

<?php
    $limit = 8;
    if(isset($_GET['trang'])){
        $page =  $_GET['trang'];
    }
    else{
        $page = '';
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }
    else{
        $begin = abs(((int)$page *$limit) - $limit);
    }
?>

<h1 class="content"></h1>
<h3 class="content--itemProduct">
    <?php
        $sql = "SELECT * FROM `books` LIMIT $begin,$limit";
        $db = new Database;
        $res = $db ->select($sql);
        if($res!==false){
            while($row = mysqli_fetch_array($res)){
    ?>
        <div class="product">
            <img width="400" height="500" src="../img/<?php echo $row['book_cover'];?>" alt="">
            <h4 class="nameProduct"><a href="product2.php?id=<?php echo $row["book_id"]; ?>"><?php echo $row["title"]; ?></a></h4>
            <p class="price">
                <?php echo number_format($row['price'])." vnđ"; ?>
            </p>
        </div>
    <?php
        }
    }
    ?>
</h3>

<h4 class="pages">
    <?php
        $sql_pages = 'SELECT * FROM `books`';
        $db = new Database;
        $row = $db->select($sql_pages);
        $count_pages = ceil(($row->num_rows) / $limit);
        for($i = 1; $i <= $count_pages; $i++){
    ?>
        <a href="product.php?trang=<?php echo $i;?>"><?php echo $i;?></a>
    <?php } ?>
</h4>

<?php
    include("footer.php");
?>
