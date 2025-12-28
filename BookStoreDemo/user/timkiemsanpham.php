<?php 
    require("header.php");
    require("nav.php");
    require("../database/config.php");
    require("../database/db.php");
?>

<?php    
    $db = new Database;
    if(!empty($_POST['tukhoa'])){
        $title = "Sản phẩm cậu đang tìm";
        $tukhoa = $_POST['tukhoa'];
        $sql = "SELECT * FROM `books` WHERE title LIKE '%$tukhoa%'";
        $res = $db->select($sql);
        
        if(mysqli_num_rows($res) == 0){
            $sql = 'SELECT * FROM `books` WHERE SUBSTRING(`book_id`,1,2) = "mt"';
            $title = "Sản phẩm không tồn tại, đây là những sản phẩm liên quan:";
        }
    }
    else{
        header("location:product.php");
    }
?>

<h1><?php echo $title;?></h1>

<h2>Sản phẩm:</h2>
<section class="content--itemProduct">
    <?php
        $res = $db->select($sql);
        if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_array($res)){
    ?>
        <article class="product">
            <img src="../img/<?php echo $row['book_cover'];?>" alt="Sản phẩm ảnh">
            <h3 class="nameProduct">
                <a href="product2.php?id=<?php echo $row["book_id"]; ?>">
                    <?php echo $row["title"]; ?>
                </a>
            </h3>
            <p class="price">
                <?php echo number_format($row["price"], 0, ",", ".") . " vnđ"; ?>
            </p>
        </article>
    <?php
            }
        } else {
            echo "<p>Không có sản phẩm nào phù hợp với từ khóa của bạn.</p>";
        }
    ?>
</section>

<?php
    require("footer.php");
?>
