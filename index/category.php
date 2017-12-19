<?php
include "../public/header.php";
?>
<ul class="category">
    <?php
        $cid = $_GET["cid"];
        include "../public/db.php";
        $sql = "select * from category WHERE pid=".$cid;
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($rows = $result->fetch()){
            if($rows["state"]==0){
                $url = "lists.php";
            }else{
                $url = "category.php";
            }
            ?>
            <li style=" background-image: url(../admin/<?php echo $rows['categoryimg'];?>) "><a href="<?php echo $url;?>?cid=<?php echo $rows['cid']?>"><?php echo $rows['cname']?></a></li>
    <?php
        }
    ?>
</ul>
</body>
<style>
    .category{
        padding: 16px 50px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
    .category>li{
        width: 200px;
        height: 200px;
        /*background: #cccccc;*/
        border-radius: 10px;
        text-align: center;
        font-size: 24px;
        line-height: 200px;
        background-size: cover;
    }
</style>
</html>