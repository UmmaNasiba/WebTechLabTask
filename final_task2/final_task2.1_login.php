<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: fnal_task2.1_dashboard.php");
    exit();
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "swadhin" && $password == "1234"){
        $_SESSION['username'] = $username;

    
        $_SESSION['last_activity'] = time();

        header("Location: final_task2.1_dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

<p style="color:red;"><?php echo $error; ?></p>

</body>
</html>