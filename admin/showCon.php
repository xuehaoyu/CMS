<?php
include "../public/loginCheckin.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<table class="table table-striped table-bordered">
    <tr>
        <th>内容标题</th>
        <th>内容图片</th>
        <th>所属分类</th>
        <th>所属其他分类</th>
        <th>操作</th>
    </tr>
    <?php
    include "../public/db.php";
    $result = $db->query("select * from shows");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while ($rows = $result->fetch()){
        $cid = $rows['cid'];
        $eid = $rows["eid"];
        ?>
        <tr>
            <td>
                <?php
                echo $rows["stitle"];
                ?>
            </td>
            <td>
                <?php
                echo $rows["sphoto"];
                ?>
            </td>
            <td>
                <?php
                $resultT = $db->query("select * from category where cid=$cid");
                $resultT->setFetchMode(PDO::FETCH_ASSOC);
                $rowsT = $resultT->fetch();
                if($cid == 0){
                    echo "一级分类";
                }else{
                    echo $rowsT["cname"];
                }
                ?>
            </td>
            <td>
                <?php
                $resultF = $db->query("select * from elsecate where eid=$eid");
                $resultF->setFetchMode(PDO::FETCH_ASSOC);
                $rowsF = $resultF->fetch();
                if($eid == 0){
                    echo "无";
                }else{
                    echo $rowsF["ename"];
                }
                ?>
            </td>
            <td>
                <a href="editCon.php?sid=<?php echo $rows['sid']?>">编辑</a>
                <a href="delCon.php?sid=<?php echo $rows['sid']?>">删除</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
<style>
    body{
        background: #e9d4b5;
    }
    .nick{
        width: 100px;
    }
    th{
        background: #b59874;
    }
</style>
</html>