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
    <script src="<?php echo $jsurl;?>/jquery-3.2.1.js"></script>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style: none;
    }
    html,body{
        width:100%;
        height:100%;
        overflow: hidden;
        background-image: url("../static/img/bg.jpg");
        background-size: cover;
    }
    .container.header{
        height: 20%;
        border: 2px solid #b59874;
        position: relative;
    }
    .container.header>h1{
        text-align: center;
        font-size: 40px;
    }
    h3{
        text-align: center;
        font-size: 24px;
    }
    .container.body{
        height: 80%;
        border: 2px solid #b59874;
        border-top: none;
        /*background: #fff;*/
    }
    .bigUl{
        width: 100%;
        height: auto;
        padding: 20px 0;
        font-size: 18px;
        font-weight: bolder;
    }
    .smallUl{
        padding: 8px 0;
    }
    .smallUl>li{
        padding: 2px 28px;
        font-size: 14px;
        font-weight: bold;
    }
    .smallUl>li>a{
        color: #000033;
    }
    .smallUl>li>a:hover{
        color: #0b2c89;
    }
    .left{
        height: 100%;
        border-right: 2px solid #b59874;
    }
    .right{
        background: #e9d4b5;
    }
    iframe{
        width:100%;
        height: 540px;
        overflow: auto;
    }
    .aname{
        color: #995d1f;
    }
    .userPhoto{
        width: 120px;
        height: 120px;
        border-radius: 50%;
        position: absolute;
        right: 10px;
        top:0;
        bottom:0;
        margin-top: auto;
        margin-bottom: auto;
        <?php
            include "../public/db.php";
            $id = $_SESSION["id"];
            $sql = "select * from admin where id=".$id;
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $result->fetch();
            $url = explode(";",$rows["aphoto"]);
        ?>
        background-image: url('../admin/<?php echo "$url[0]"; ?>');
        background-size: cover;
        z-index: 2;
    }
    .photoBox{
        width: 0px;
        height: 120px;
        background: #e1bc95;
        border-radius: 5px;
        position: absolute;
        right: 70px;
        top:0;
        bottom:0;
        margin-top: auto;
        margin-bottom: auto;
        overflow: hidden;
        transition: width 0.8s;
    }
    .exit{
        height:20px;
        width: 72px;
        background: #ffffff;
        position: absolute;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        padding: 0 4px;
        bottom: 14px;
        left: 14px;
        border-radius: 10px;
    }
    .nickname{
        height:20px;
        width: auto;
        background: #ffffff;
        position: absolute;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        padding: 0 8px;
        top: 14px;
        left: 14px;
        border-radius: 10px;
    }
    .backHead{
        height:20px;
        width: 72px;
        background: #ffffff;
        position: absolute;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        padding: 0 4px;
        bottom: 40px;
        left: 14px;
        border-radius: 10px;
    }
</style>
<body>
<div class="container header">
    <h3>管理员<span class="aname"><?php echo $_SESSION["aname"]?></span></h3>
    <h1>WELCOME CMS</h1>
    <div class="userPhoto"></div>
    <div class="photoBox">
        <div class="nickname"><?php echo $rows["anick"]; ?></div>
        <a href="../index/index.php" class="backHead">回到首页</a>
        <a href="../admin/exitLogin.php" class="exit">退出登录</a>
    </div>
</div>
<div class="container body">
    <div class="left col-xs-4 col-sm-3">
        <ul class="bigUl">
            <li>
                管理员
                <ul class="smallUl">
                    <li><a href="../admin/showUser.php" target="right">查看管理员</a></li>
                    <li><a href="../admin/addUser.php" target="right">添加管理员</a></li>
                </ul>
            </li>
            <li>
                分类管理
                <ul class="smallUl">
                    <li><a href="../admin/showCategory.php" target="right">查看分类</a></li>
                    <li><a href="../admin/addCategory.php" target="right">添加分类</a></li>
                </ul>
            </li>
            <li>
                内容管理
                <ul class="smallUl">
                    <li><a href="../admin/showCon.php" target="right">查看内容</a></li>
                    <li><a href="../admin/addCon.php" target="right">添加内容</a></li>
                </ul>
            </li>
            <li>
                其他分类管理
                <ul class="smallUl">
                    <li><a href="../admin/showElsecate.php" target="right">查看其他分类</a></li>
                    <li><a href="../admin/addElsecate.php" target="right">添加其他分类</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="right col-xs-8  col-sm-9">
        <iframe src="" frameborder="0" name="right" scrolling="auto" ></iframe>
    </div>
</div>
</body>
<script>
    let userPhoto = document.querySelector(".userPhoto");
    let photoBox = document.querySelector(".photoBox");
    userPhoto.onmouseenter = function () {
        photoBox.style.width = "180px";
    }
    userPhoto.onmouseleave = function () {
        photoBox.style.width = 0;
    }
    photoBox.onmouseenter = function () {
        photoBox.style.width = "180px";
    }
    photoBox.onmouseleave = function () {
        photoBox.style.width = 0;
    }
</script>
</html>