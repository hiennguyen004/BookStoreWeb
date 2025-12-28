<?php
    include("header.php");
    include("nav.php");
?>
    <?php
        include('conect.php');
        $sql="select MAX(masach) from donhang";
        $result = mysqli_query($conn,$sql);
        // while($row = mysqli_fetch_array($result)){
        $sanPham = mysqli_fetch_assoc($result);
        echo (int)implode(" ",$sanPham) ;
        $sql = 'SELECT * FROM `sach`';
        $res = $conn ->query($sql);
        while($row = mysqli_fetch_array($res)){}
    ?>
<?php
    include("footer.php");

?>