<?php
include "../kernel/uploadClass.php";
$upload = new upload();
$upload->rootPath = "category";
$upload->move();