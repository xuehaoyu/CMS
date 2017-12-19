<?php
$url = $_SERVER["SCRIPT_NAME"];
$port = strtolower(strchr($_SERVER["SERVER_PROTOCOL"],"/",true));
$str = substr($url,0,strrpos($url,"/"));
$str = substr($str,0,strrpos($str,"/")+1);
$cssurl = $port."://".$_SERVER["HTTP_HOST"].$str."static/"."css/";
$jsurl = $port."://".$_SERVER["HTTP_HOST"].$str."static/"."js/";
$imgurl = $port."://".$_SERVER["HTTP_HOST"].$str."static/"."img/";
$editorurl = $port."://".$_SERVER["HTTP_HOST"].$str."static/"."editor/";
?>