<?php
$sid = $_GET["sid"];
include "../public/db.php";
$sql = "delete from shows where sid=".$sid;
if($db->exec($sql)){
    echo "<script>alert('删除内容成功');location.href='showCon.php'</script>";
}