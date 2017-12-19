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
        <th>分类名称</th>
        <th>ElseCategory ID</th>
        <th>操作</th>
    </tr>
    <?php
    include "../public/db.php";
    $result = $db->query("select * from elsecate");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while ($rows = $result->fetch()){
        ?>
        <tr>
            <td>
                <?php
                echo $rows["ename"];
                ?>
            </td>
            <td>
                <?php
                echo $rows["eid"];
                ?>
            </td>
            <td>
                <a href="editElsecate.php?eid=<?php echo $rows['eid']?>">编辑</a>
                <a href="delElsecate.php?eid=<?php echo $rows['eid']?>">删除</a>
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