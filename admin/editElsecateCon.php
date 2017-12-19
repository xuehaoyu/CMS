<?php
    $eid = $_GET["eid"];
    $ename = $_POST["ename"];
    include "../public/db.php";
    $sql = "update elsecate set ename='$ename' where eid=".$eid;
    if($db->exec($sql)){
        echo "<script>alert('修改其他分类成功');location.href='showElsecate.php'</script>";
    }
?>