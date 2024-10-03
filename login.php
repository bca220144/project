<?php
$conn = mysqli_connect("localhost", "root", "", "project");
if (!$conn) {
    echo "Database not connected";
    exit(); // Exit if the database connection fails
}

if (isset($_POST['submit'])) {
    $name = $_POST['email'];
    $password = $_POST['password'];
    
    // For debugging
    echo "Email: " . htmlspecialchars($name) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br>";

    $sql = "SELECT * FROM `login` WHERE `email`='$name' AND `password`='$password'";
    // For debugging
    echo "SQL Query: " . htmlspecialchars($sql) . "<br>";
    
    $data = mysqli_query($conn, $sql);
    if ($data) {
        if (mysqli_num_rows($data) > 0) {
            $value = mysqli_fetch_assoc($data);
            if ($value['user_code'] == 1) {
                header('Location: tchrdashbrd.html');
                exit();
            } elseif ($value['user_code'] == 0) {
                header('Location: studentdashbrd.html');
                exit();
            } else {
                header('Location: admindashbrd.html');
                exit();
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
    } else {
        echo "<script>alert('Query failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>
<div class="LoginContainer">
    <form class="LoginForm" method="POST" action="">
        <h1><u>SIGN IN</u></h1>
        <input class="LoginInput" type="email" name="email" placeholder="Enter your email" required>
        <input class="LoginInput" type="password" name="password" placeholder="Enter your password" required>
        <input class="LoginSubmit" type="submit" name="submit" value="Login">
        <p>Don't have an account? <a href="registration.php">Sign Up Here</a></p>
    </form>
</div>
</body>
</html>
