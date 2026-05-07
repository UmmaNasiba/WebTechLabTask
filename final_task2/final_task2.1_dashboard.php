<?php
session_start();

$timeout = 30;


if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout){
    session_unset();
    session_destroy();
    header("Location: final_task2.1_login.php");
    exit();
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

<p>Your session will expire after 30 seconds of inactivity.</p>

<a href="final_task2.1_logout.php">Logout</a>

</body>
</html>