<?php
    header("content-type:text/html;charset:UTF-8");
    include "../public/db.php";
    /*preg_match("/^[a-z]\w{4,9}$/");*/
    $aname = htmlspecialchars(addslashes($_POST["aname"]));
    $apass = md5($_POST["apass"]);
    $anick = $_POST["anick"];
    $aphoto = $_POST["aphoto"];
    $sql = "insert into admin (aname,apass,anick,aphoto) values ('$aname','$apass','$anick','$aphoto')";
    if($db->exec($sql)){
        echo "<script>alert('添加成功');location.href='addUser.php'</script>";
    }else{
        echo "<script>alert('添加失败');location.href='addUser.php'</script>";
    }
?>