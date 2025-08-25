<?php
session_start();
session_destroy();
header("Location: login-adm.php");
exit;
?>
