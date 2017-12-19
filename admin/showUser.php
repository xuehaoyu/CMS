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
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <table class="table table-striped table-bordered">
        <tr>
            <th>用户名</th>
            <th>密码</th>
            <th>昵称</th>
            <th>头像</th>
            <th>操作</th>
        </tr>
            <?php
              include "../public/db.php";
                $result = $db->query("select * from admin");
                $result->setFetchMode(PDO::FETCH_ASSOC);
                while ($rows = $result->fetch()){
                    $url = explode(';',$rows["aphoto"]);
                    ?>
            <tr>
                <td>
                    <?php
                    echo $rows["aname"];
                    ?>
                </td>
                <td>
                    <?php
                    echo $rows["apass"];
                    ?>
                </td>
                <td>
                    <?php
                    echo $rows["anick"];
                    ?>
                </td>
                <td>
                    <img class="nick" src="<?php echo $url[0]; ?>" alt="">
                </td>
                <td>
                    <a href="editUser.php?id=<?php echo $rows["id"] ?>">编辑</a>
                    <a href="delUser.php?id=<?php echo $rows["id"] ?>">删除</a>
                </td>
            </tr>
                    <?php
                }
            ?>
    </table>
</body>
<style>
    body{
        background: #e9d4b5;
    }
    .nick{
        width: 100px;
    }
    th{
        background: #b59874;
    }
</style>
</html>