<?php
$sid = $_POST["sid"];
$cid = $_POST["cid"];
$eid = $_POST["eid"];
$stitle = $_POST["stitle"];
$scon = $_POST["scon"];
include "../public/db.php";
$sql = "update shows set stitle='$stitle',scon='$scon',cid='$cid',eid='$eid' where sid=".$sid;
if($db->exec($sql)){
    echo "<script>alert('修改内容成功');location.href='showCon.php'</script>";
}