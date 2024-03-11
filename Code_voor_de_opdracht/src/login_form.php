<?php

// Is the login button clicked?
if(isset($_POST['login-btn']) ){
    require "../vendor/autoload.php"; // Include PHP
    //require_once 'classes/user.php';

    $user = new User();

    $user->username = $_POST['username'];
    $user->SetPassword($_POST['password']);

    $user->ShowUser();

    // Validate user data
    $errors = $user->ValidateUser();

    // If no errors, attempt login
    if(count($errors) == 0){
        // Login
        if ($user->LoginUser()){
            // Redirect to index page after successful login
            header("location: index.php");
            exit; // Ensure no further execution of script after redirect
        } else {
            array_push($errors, "Login failed");
        }
    }

    // Display errors if any
    if(count($errors) > 0){
        $message = implode("\\n", $errors);
        echo "<script>alert('" . $message . "')</script>";
        echo "<script>window.location = 'login_form.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h3>PHP - PDO Login and Registration</h3>
    <hr/>

    <form action="" method="POST">    
        <h4>Login here...</h4>
        <hr>
        
        <label>Username</label>
        <input type="text" name="username" />
        <br>
        <label>Password</label>
        <input type="password" name="password" />
        <br>
        <button type="submit" name="login-btn">Login</button>
        <br>
        <a href="register_form.php">Registration</a>
    </form>
    
</body>
</html>
