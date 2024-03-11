<?php

// Is de register button aangeklikt?
if(isset($_POST['register-btn'])){
    require "../vendor/autoload.php"; // Include PHP
    //require_once 'classes/user.php';
	
    $user = new User();
    $errors = [];

    $user->username = $_POST['username'];
    $user->SetPassword($_POST['password']);

    $user->ShowUser();

    // Validatie gegevens - You need to implement this part

    // Check if there are no errors before attempting to register
    if(count($errors) == 0){
        // Register user
        $registrationErrors = $user->RegisterUser();

        if(count($registrationErrors) > 0){
            $message = implode("\\n", $registrationErrors);
            echo "<script>alert('" . $message . "')</script>";
            echo "<script>window.location = 'register_form.php'</script>";
        } else {
            echo "<script>alert('" . "User registered successfully" . "')</script>";
            echo "<script>window.location = 'login_form.php'</script>";
        }
    } else {
        $message = implode("\\n", $errors);
        echo "<script>alert('" . $message . "')</script>";
        echo "<script>window.location = 'register_form.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h3>PHP - PDO Login and Registration</h3>
    <hr/>

    <form action="" method="POST">    
        <h4>Register here...</h4>
        <hr>
        
        <div>
            <label>Username</label>
            <input type="text" name="username" />
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <br />
        <div>
            <button type="submit" name="register-btn">Register</button>
        </div>
        <a href="index.php">Home</a>
    </form>
</body>
</html>
