<?php
include "../public/header.php";
?>
<ul>
    <?php
        include "../public/db.php";
        $cid = $_GET["cid"];
        $sql = "select * from shows where cid=".$cid;
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($rows = $result->fetch()){
            ?>
            <li><a href="content.php?sid=<?php echo $rows['sid']; ?>"><?php echo $rows["stitle"]?></a></li>
    <?php
        }
    ?>
</ul>
<style>
    ul{
        width: 300px;
        height: 300px;
        margin-left: 100px;
    }
    li{
        padding: 20px 20px;
    }
</style>
</body>
</html>
