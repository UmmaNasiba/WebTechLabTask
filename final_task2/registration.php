
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ragistration</title>
</head>
<body>
    <h2>Registration Page</h1>
    <form action="registration.php" method="post">
        <label for="name" required> Name            :</label><br>
        <input type="text" name="name"><br><br>
        <label for="email">Email    :</label><br>
        <input type="email" name="email"><br><br>
        <label for="pass">Password:</label><br>
        <input type="password" name="pass"><br><br>

        <input type="reset" name="resetbtn">
        <input type="submit" name="submitbtn"><br>

    </form>
    <a href="login.php">login page</a> <br><br>
</body>
</html>

<?php
include 'db.php';

if(isset($_POST['submitbtn'])){
$name=$_POST['name'];
$email=$_POST['email'];
$pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
$sql= "INSERT INTO users (name,email,password) VALUES ('$name','$email', '$pass') ";

if(mysqli_query($conn, $sql)){
    echo "Registration successful!";
}
else{
    echo "Error: ".mysqli_error($conn);
}
}

?>

