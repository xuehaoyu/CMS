<?php
$cid = $_POST["cid"];
$stitle = $_POST["stitle"];
$scon = $_POST["scon"];
$sphoto = $_POST["conImg"];
if(isset($_POST["eid"])){
    $eid = $_POST["eid"];
}else{
    $eid = 0;
}
include "../public/db.php";
$sql = "insert into shows (stitle,scon,sphoto,cid,eid) values ('$stitle','$scon','$sphoto','$cid','$eid')";
if($db->exec($sql)){
    echo "<script>alert('添加内容成功');location.href='addCon.php'</script>";
}