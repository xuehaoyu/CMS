<?php
include "../kernel/uploadClass.php";
$upload = new upload();
$upload->rootPath = "conImg";
$upload->move();
