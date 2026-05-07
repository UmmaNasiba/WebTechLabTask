<?php
session_start();

session_destroy();

header("Location: final_task2.1_login.php");
exit();
?>