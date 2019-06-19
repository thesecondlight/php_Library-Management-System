<title>这是个空页面</title>
<?php
include_once("conn.php");
session_start();
session_unset($_SESSION['name']);
//session_destroy();
//$_SESSION['name']=null;
?>
注销成功，点击<a href="index.php">这里</a>重新登录
