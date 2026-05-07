<?php
session_start();


$timeout = 60;

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout){
    session_unset();
    session_destroy();
    header("Location: login.php?msg=Session expired");
    exit();
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Dashboard</h2>

<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

<?php
if(isset($_COOKIE['last_login'])){
    echo "<p>Last Login: " . $_COOKIE['last_login'] . "</p>";
}
?>

<p>Session expires after 1 minute of inactivity.</p>

<a href="logout.php">Logout</a>

</body>
</html>