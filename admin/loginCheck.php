<?php
session_start();
 include "../public/db.php";
header("content-type:text/html,charset:UTF-8");
 /*防止sql注入对用户名进行处理*/
 $aname = htmlspecialchars(addslashes($_POST["aname"]));
 $apass = md5($_POST["apass"]);
 $sql = "select * from admin where aname='$aname' and apass='$apass'";
 $result = $db->query($sql);
 $result->setFetchMode(PDO::FETCH_ASSOC);
 $rows = $result->fetch();
if($result->rowCount() > 0){
     $message = "LOGIN SUCCESS";
     $url = "index.php";
     $_SESSION["login"] = "login";
     $_SESSION["aname"] = $aname;
     $_SESSION["id"] = $rows["id"];
     include "checkSkip.php";
 }else{
     $message = "LOGIN FAILE";
     $url = "login.php";
    include "checkSkip.php";
 }
?>