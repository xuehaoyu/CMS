<?php
    $eid = $_GET["eid"];
    include "../public/db.php";
    $sql = "delete from elsecate where eid=".$eid;
    if($db->exec($sql)){
        echo "<script>alert('删除其他分类成功');location.href='showElsecate.php'</script>";
    }
