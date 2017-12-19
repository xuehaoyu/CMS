<?php
include "../public/loginCheckin.php";
include "../public/path.php";
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
    <script src="<?php echo $jsurl; ?>/upload.js"></script>
</head>
<body>
<form action="addCategoryCon.php" method="post">
    <h3>ADD CATEGORY</h3>
    <label for="exampleInputEmail1">所属分类</label>
    <select class="form-control" name="pid">
        <option value="0">一级分类</option>
        <?php
        include "../public/db.php";
        include "../kernel/functions.php";
        $treeObj = new tree();
        $treeObj->createTree(0,$db,"category",-1,"——");
        echo $treeObj->str;
        ?>
    </select>
    <label for="exampleInputEmail1">分类名称</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="分类" name="cname">
    <div class="form-group">
        <label for="exampleInputPassword1">分类导引图</label>
        <div class="upView"></div>
    </div>
    <input type="hidden" name="categoryimg" value="">
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
    .upView{
        width: 500px;
        padding: 10px 0;
        margin: 0 auto;
    }
</style>
<script>
    let upView = document.querySelector(".upView");
    let upObj = new upload();
    let imgObj = document.querySelector("input[type=hidden]")
    upObj.createView({parent:upView});
    upObj.up("upCategoryImg.php",function (arr) {
        imgObj.value = arr.join(";");
    });
</script>
</html>