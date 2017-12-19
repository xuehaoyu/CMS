<?php
$id = $_GET["id"];
include "../public/db.php";
if($db->exec("delete from admin where id=".$id)){
    echo "<script>alert('删除成功');location.href='showUser.php'</script>";
}