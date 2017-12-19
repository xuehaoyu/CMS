<?php
$id = $_GET["id"];
header("content-type:text/html;charset:UTF-8");
include "../public/db.php";
/*preg_match("/^[a-z]\w{4,9}$/");*/
$aname = htmlspecialchars(addslashes($_POST["aname"]));
$apass = $_POST["apass"];
$anick = $_POST["anick"];
$aphoto = $_POST["aphoto"];
if($apass){
    $apass = md5($apass);
    $sql = "update admin set aname='$aname',apass='$apass',anick='$anick',aphoto='$aphoto' where id=".$id;
}else{
    $sql = "update admin set aname='$aname',anick='$anick',aphoto='$aphoto' where id=".$id;
}
if($db->exec($sql)){
    echo "<script>alert('修改成功');location.href='showUser.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='showUser.php'</script>";
}