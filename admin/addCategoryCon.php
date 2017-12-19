<?php
header("content-type:text/html;charset:UTF-8");
include "../public/db.php";
$pid = $_POST["pid"];
$cname = $_POST["cname"];
$categoryimg = $_POST["categoryimg"];
if($pid == 0){
    $sql = "insert into category (cname,pid,state,categoryimg) values ('$cname','$pid',0,'$categoryimg')";
    if($db->exec($sql)){
        echo "<script>alert('添加成功');location.href='addCategory.php'</script>";
    }
}else{
    $sql = "update category set state=1 where cid=".$pid;
    $db->exec($sql);
    $sqlT = "insert into category (cname,pid,state,categoryimg) values ('$cname','$pid',0,'$categoryimg')";
        if($db->exec($sqlT)){
            echo "<script>alert('添加成功');location.href='addCategory.php'</script>";
        }
}
