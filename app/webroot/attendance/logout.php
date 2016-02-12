<?php
require_once("config.php");
@session_start();
unset($_SESSION['id']);
unset($_SESSION['login_id']);
unset($_SESSION['username']);
ob_start();
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
ob_flush();
?>
