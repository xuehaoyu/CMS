<?php
    include "../public/header.php";
?>
<div class="con">
    <?php
    $sid = $_GET["sid"];
    include "../public/db.php";
    $sql = "select * from shows where sid=".$sid;
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $result->fetch();
    ?>
    <h3 class="title"><?php echo $rows["stitle"]; ?></h3>
    <div class="content"><?php echo $rows["scon"]; ?></div>
</div>
</body>
<style>
    h3{
        text-align: center;
        line-height: 100px;
        font-size: 30px;
    }
    .content{
        text-align: center;
        line-height: 50px;
        font-size: 20px;
    }
</style>
</html>
