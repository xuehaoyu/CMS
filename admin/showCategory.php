<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/php/CMS/static/css/bootstrap.css">
</head>
<body>
    <div class="body">
        <h3>Show CateGory</h3>
            <?php
                include "../public/db.php";
                include "../kernel/functions.php";
                $treeObj = new tree();
                $treeObj->cateShowTree(0,$db,"category");
                echo $treeObj->ul;
            ?>
    </div>
</body>
<style>
    *{
        margin:0;
        padding: 0;
        list-style: none;
    }
    html,body{
        width: 100%;
        height: 100%;
        background: #e9d4b5;
    }
    .body{
        width:100%;
        height: 100%;
    }
    h3{
        text-align: center;
        font-size: 24px;
    }
    .lists{
        padding: 4px 100px;
    }
    .lists>li{
        width: 300px;
        height: 30px;
        line-height: 30px;
        background: rgba(182,166,139,0.3);
        padding: 0 10px;
        border-radius: 5px;
        /*text-align: center;*/
        position: relative;
    }
    .edit,.delete{
        width: 46px;
        height: 30px;
        background: rgba(182,166,139,0.7);
        position: absolute;
        border-radius: 5px;
        text-align: center;
        line-height: 30px;
        color: #353433;
    }
    .delete{
        right: 0;
        top:0;
    }
    .edit{
        top:0;
        right:54px;
    }
</style>
</html>