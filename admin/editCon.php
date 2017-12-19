<?php
include "../public/loginCheckin.php";
include "../public/path.php"
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
<form action="editConCon.php" method="post">
    <h3>CHANGE CONTENT</h3>
    <label for="exampleInputEmail1">修改当前内容所属分类</label>
    <select class="form-control" name="cid">
        <option value="0">一级分类</option>
        <?php
        include "../public/db.php";
        include "../kernel/functions.php";
        $sid = $_GET["sid"];
        $sql = "select * from shows where sid=$sid";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $result->fetch();
        $cid = $rows["cid"];
        $eid = $rows["eid"];
        $treeObj = new tree();
        $treeObj->conCateTree(0,$db,"category",-1,'——',$cid);
        echo $treeObj->conStr;
        ?>
    </select>
    <label for="exampleInputEmail1">修改当前内容所属其他分类</label><br>
    <div class="radioBox">
        <?php
        $sql = "select * from elsecate";
        $resultT = $db->query($sql);
        $resultT->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowsT = $resultT->fetch()) {
            if ($rowsT["eid"] == $eid) {
                ?>
                <input type="radio" name="eid" value="<?php echo $rowsT['eid']; ?>" checked="checked">
                <div class="elseName"><?php echo $rowsT['ename']; ?></div>
                <?php
            } else {
                ?>
                <input type="radio" name="eid" value="<?php echo $rowsT['eid']; ?>">
                <div class="elseName"><?php echo $rowsT['ename']; ?></div>
                <?php
            }
        }
            ?>
        <?php
            if($eid == 0){
                ?>
                <input type="radio" value="0" checked="checked"><div class="elseName">无</div>
        <?php
            }else{
                ?>
                <input type="radio" value="0"><div class="elseName">无</div>
        <?php
            }
        ?>
    </div>
    <label for="exampleInputEmail1">修改标题</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="内容" name="stitle" value="<?php echo $rows['stitle']; ?>">
    <!--修改文章内容-->
    <label for="exampleInputEmail1">修改文章内容</label><br>
    <div><script id="editor" type="text/plain" style="width:100%;height:200px;" name="scon"><?php echo $rows['scon']; ?></script></div>
    <!--修改内容图片-->
    <label for="exampleInputEmail1">修改内容图</label><br>
    <img src="../admin/<?php echo $rows['sphoto']; ?>" alt="" class="conImg">
    <div class="upView"></div>
    <input type="hidden" name="sid" value="<?php echo $sid; ?>">
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
    .conImg{
        width:100px;
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