<?php
    if(isset($_SESSION["login"])){
        /*echo "<script>alert('已登录');location.href='../index/index.php'</script>";*/
        $message = "ALREADY LOGIN";
        $url = "index.php";
        include "checkSkip.php";
        exit();
    }
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
    <script src="http://localhost/php/CMS/static/js/jquery-3.2.1.js"></script>
    <script src="http://localhost/php/CMS/static/js/jquery.validate.js"></script>
</head>
<script>
    $(function () {
        $("#form").validate({
            rules:{
                aname:{
                    required:true,
                    minlength:5,
                },
                apass:{
                    required:true,
                    minlength:5,
                }
            },
            messages:{
                aname:{
                    required:"用户名必填",
                    minlength:"长度必须超过五位",
                },
                apass:{
                    required:"密码不能为空",
                    minlength:"长度必须超过五位",
                }
            }
        })
    })
</script>
<style>
    html,body{
        width:100%;
        height:100%;
        overflow: hidden;
        background-image: url("../static/img/bg.jpg");
        background-size: cover;
    }
    .login{
        width: 500px;
        height: 350px;
        position: fixed;
        top:0;
        bottom:0;
        left:0;
        right: 0;
        margin:auto;
    }
    h3{
        text-align: center;
        font-size: 42px;
        padding: 10px 0;
        color: #995d1f;
    }
    .form-group{
        position: relative;
    }
    label[class="error"]{
        position: absolute;
        right: 10px;
        top:30px;
        color: red;
    }
    .btn{
        display: block;
        margin: 22px auto;
    }
</style>
<body>
    <div class="login">
        <h3>LOGIN</h3>
        <form action="../admin/loginCheck.php" method="post" id="form">
            <div class="form-group">
                <label for="exampleInputEmail1">用户名</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="name" name="aname">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">密码</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="apass">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</body>
</html>
