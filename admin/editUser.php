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
    <script src="http://localhost/php/CMS/static/js/jquery-3.2.1.js"></script>
    <script src="http://localhost/php/CMS/static/js/jquery.validate.js"></script>
    <script src="http://localhost/php/CMS/static/js/upload.js"></script>
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
                    minlength:6,
                }
            },
            messages:{
                aname:{
                    required:"用户名必填",
                    minlength:"长度至少为五",
                },
                apass:{
                    minlength:"长度至少为六",
                }
            }
        })
    })
</script>
<style>
    body{
        background: #e9d4b5;
    }
    h3{
        text-align: center;
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
</style>
<?php
    $id = $_GET["id"];
    include "../public/db.php";
    $sql = "select * from admin where id=".$id;
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $result->fetch();
    $url = explode(";",$rows["aphoto"]);
?>
<body>
<form action="editUserCon.php?id=<?php echo $rows["id"]; ?>" method="post" id="form">
    <h3 class="title">CHANGE USER</h3>
    <div class="form-group">
        <label for="exampleInputEmail1">管理员姓名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="name" name="aname" value="<?php echo $rows["aname"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">密码</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="pass" name="apass">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">昵称</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="anick" name="anick" value="<?php echo $rows["anick"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">头像</label>
        <div class="upView">
            <img src="<?php echo $url[0]; ?>" alt="" width="100px">
        </div>
    </div>
    <input type="hidden" name="aphoto" value="<?php echo $rows["aphoto"]; ?>">
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>
<script>
    let upObj = new upload();
    let upView = document.querySelector(".upView");
    let imgobj = document.querySelector("input[type=hidden]");
    upObj.createView({parent:upView});
    upObj.up("upload.php",function (arr) {
        imgobj.value = arr.join(";");
    })
</script>
</html>