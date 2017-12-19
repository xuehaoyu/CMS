<?php
session_start();
if(!isset($_SESSION["login"])){
    include "../admin/login.php";
    exit();
}
?>