<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["asname"]);
unset($_SESSION["id"]);
echo "<script>alert('已安全退出');location.href='login.php'</script>";
?>