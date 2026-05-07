<?php
session_start();
include("db.php");

$error = "";

$saved_email = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['username'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        $_SESSION['last_activity'] = time();

        setcookie("user_email", $email, time() + (7*24*60*60));
        setcookie("last_login", date("Y-m-d H:i:s"), time() + (7*24*60*60));

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<form method="post">
Email: <input type="email" name="email" value="<?php echo $saved_email; ?>" required><br><br>
Password: <input type="password" name="password" required><br><br>
<input type="submit" value="Login">
</form>

<p style="color:red;"><?php echo $error; ?></p>

<a href="registration.php">Register</a>

</body>
</html>