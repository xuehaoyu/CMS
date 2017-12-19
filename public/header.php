<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://localhost/php/CMS/static/js/jquery-3.2.1.js"></script>
</head>
<style>
    *{
        margin:0;
        padding: 0;
        text-decoration: none;
        list-style:none;
    }
    .head{
        width: 100%;
        height: 62px;
        background: #f5f5f5;
        padding: 16px 50px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        box-sizing: border-box;
    }
</style>
<body>
<nav class="head">
    <a href="../index/index.php">首页</a>
    <?php
    include "../public/db.php";
    $sql = "select * from category where pid=0";
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while($rows = $result->fetch()){
        /*$sqlT = "select count(cid) as num from category where pid=".$rows['cid'];
        $resultT = $db->query($sqlT);
        $resultT->setFetchMode(PDO::FETCH_ASSOC);
        $rowT = $resultT->fetch();
        if($rowT["num"]>0){
            $url = "category.php";
        }else{
            $url = "lists.php";
        }*/
        if($rows["state"]==0){
            $url = "lists.php";
        }else{
            $url = "category.php";
        }
         ?>
        <a href="<?php echo $url;?>?cid=<?php echo $rows['cid'];?>"><?php echo $rows["cname"];?></a>
        <?php
    }
    ?>
</nav>