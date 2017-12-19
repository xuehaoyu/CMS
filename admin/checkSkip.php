<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="skip">
        <h3 class="title"><?php  echo $message; ?></h3>
        <div class="body">
            <span class="second">3</span>
        </div>
        <div class="bottom">
            Click <a href="<?php echo $url; ?>">FORWARD</a>
        </div>
    </div>
</body>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    html,body{
        width:100%;
        height:100%;
        overflow: hidden;
        background-image: url("../static/img/bg.jpg");
        background-size: cover;
    }
    .skip{
        width: 500px;
        height: 300px;
        position: fixed;
        top:0;
        bottom:0;
        left:0;
        right:0;
        margin: auto;
    }
    .title{
        width: 100%;
        text-align: center;
        line-height: 100px;
        font-size: 40px;
        color: #995d1f;
    }
    .body{
        width: 100%;
        font-size: 20px;
        padding: 10px 0;
        line-height: 80px;
        text-align: center;
        font-size: 38px;
        color: #fff;
    }
    .body>span{
        display: block;
        width: 80px;
        height: 80px;
        margin: 0 auto;
        border-radius: 50%;
        background: rgba(0,0,0,0.5);
    }
    .bottom{
        width: 100%;
        font-size: 22px;
        text-align: center;
        font-weight: bold;
        line-height: 50px;
    }
</style>
<script>
    let second = document.querySelector(".second");
    let num = 3;
    setInterval(function () {
        num--;
        second.innerHTML = num;
        if(num <= 0){
            location.href = "<?php echo $url; ?>";
        }
    },1000)
</script>
</html>