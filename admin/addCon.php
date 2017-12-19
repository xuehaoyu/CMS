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
    <script src="<?php echo $editorurl; ?>ueditor.config.js" type="text/javascript" charset="utf-8" ></script>
    <script src="<?php echo $editorurl; ?>ueditor.all.min.js" type="text/javascript" charset="utf-8" ></script>
    <script src="<?php echo $editorurl; ?>lang/zh-cn/zh-cn.js" type="text/javascript" charset="utf-8" ></script>
    <script src="<?php echo $jsurl; ?>upload.js"></script>
</head>
<body>
<form action="addConCon.php" method="post">
    <h3>ADD CONTENT</h3>
    <label for="exampleInputEmail1">选择所属分类</label>
    <select class="form-control" name="cid">
        <option value="0">一级分类</option>
        <?php
            include "../public/db.php";
            include "../kernel/functions.php";
            $treeObj = new tree();
            $treeObj->createTree(0,$db,"category",-1,'——');
            echo $treeObj->str;
        ?>
    </select>
    <label for="exampleInputEmail1">选择所属其他分类</label><br>
    <div class="radioBox">
    <?php
        $sql = "select * from elsecate";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($rows = $result->fetch()){
            ?>
            <input type="radio" name="eid" value="<?php  echo $rows['eid']; ?>"><div class="elseName"><?php echo $rows['ename']; ?></div>
    <?php
        }
    ?>
        <input type="radio" value="0"><div class="elseName">无</div>
    </div>
    <label for="exampleInputEmail1">添加标题</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="内容" name="stitle">
    <label for="exampleInputEmail1">添加文章内容</label><br>
    <div><script id="editor" type="text/plain" style="width:100%;height:200px;" name="scon"></script></div>
    <label for="exampleInputEmail1">上传内容图</label><br>
    <div class="upView"></div>
    <input type="hidden" name="conImg">
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
    input[type="radio"]{
        margin-left: 20px;
    }
    input[type="radio"]:first-child{
        margin-left: 0px;
    }
    .radioBox{
        display: flex;
        flex-wrap: wrap;
    }
    .upView{
        width: 500px;
        padding: 10px 0;
        margin: 0 auto;
    }
</style></html>
<script>
    var ue = UE.getEditor('editor');
    let upView = document.querySelector(".upView");
    let upObj = new upload();
    let imgObj = document.querySelector("input[type=hidden]");
    upObj.multipleFlag = true;
    upObj.createView({parent:upView});
    upObj.up("upConImg.php",function (arr) {
        imgObj.value = arr.join(";");
    })
</script>
