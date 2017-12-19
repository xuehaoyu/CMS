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
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
</head>
<body>
<form action="editCategoryCon.php" method="post">
    <h3>CHANGE CATEGORY</h3>
    <label for="exampleInputEmail1">修改所属分类</label>
    <select class="form-control" name="pid">
        <option value="0">一级分类</option>
        <?php
        $cid = $_GET["cid"];
        include "../public/db.php";
        include "../kernel/functions.php";
        $treeObj = new tree();
        $treeObj->createTree(0,$db,"category",-1,"——",$cid);
        echo $treeObj->str;
        $sql = "select * from category where cid=".$cid;
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $result->fetch();
        ?>
    </select>
    <label for="exampleInputEmail1">修改分类名称</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="分类" name="cname" value="<?php echo $rows['cname']; ?>">
    <input type="hidden" name="cid" value="<?php echo $cid;?>">
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>
<style>
    body{
        background: #e9d4b5;
    }
    .btn{
        display: block;
        margin: 20px auto;
    }
    h3{
        text-align: center;
    }
    label{
        padding-top: 10px;
    }
</style>
</html>