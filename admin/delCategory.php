<?php
$cid = $_GET["cid"];
include "../public/db.php";
include "../kernel/functions.php";
$delObj = new tree();
$delObj->delCategory($cid,$db,"category");