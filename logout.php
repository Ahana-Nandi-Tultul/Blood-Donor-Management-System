<?php
session_start();
session_unset();
session_destroy();
// echo(var_dump($_SESSION));
header('location: index.php');
exit;
?>