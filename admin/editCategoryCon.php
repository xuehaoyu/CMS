<?php
$cid = $_POST["cid"];
$pid = $_POST['pid'];
$cname = $_POST["cname"];
include "../public/db.php";
$sql = "update category set cname='$cname',pid='$pid' where cid=".$cid;
if($db->exec($sql)){
    echo "<script>alert('修改成功');location.href='showCategory.php'</script>";
}