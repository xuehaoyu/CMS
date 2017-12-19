<?php
include "../public/db.php";
$ename = $_POST["ename"];
$sql = "insert into elsecate (ename) values ('$ename')";
if($db->exec($sql)){
    echo "<script>alert('添加其他分类成功');location.href='addElsecate.php'</script>";
}