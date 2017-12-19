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
    <script src="http://localhost/php/CMS/static/js/upload.js"></script>
</head>
<body>
<?php
    include "../public/db.php";
    $eid = $_GET["eid"];
    $sql = "select * from elsecate where eid=".$eid;
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$result->fetch();
?>
<form action="editElsecateCon.php?eid=<?php echo $rows['eid']; ?>" method="post">
    <h3>CHANGE ELSECATEGORY</h3>
    <label for="exampleInputEmail1">修改当前其他分类</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name="ename" value="<?php echo $rows['ename']; ?>">
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
</html>