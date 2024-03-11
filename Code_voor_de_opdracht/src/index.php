<?php
// Function: program login OOP 
// Author: nouaman

// Initialize
?>

<!DOCTYPE html>
<html lang="en">
<body>
	<h3>PDO Login and Registration</h3>
	<hr/>

	<h3>Welcome to the HOME page!</h3>
	<br />

	<?php
	require "../vendor/autoload.php"; // Include PHP
    //require_once 'classes/user.php';
	use loginOpdracht\classes\User;
    $user = new User();

	// Activate the session
	session_start();

	// If Logout is clicked
	if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
		$user->Logout();
	}

	// Check login session: is the user in the session?
	if(!$user->IsLoggedIn()){
		// Alert not logged in
		echo "You are not logged in. Please log in to proceed.<br><br>";
		// Show login button
		echo '<a href="login_form.php">Login</a>';
	} else {
		// Select user data from the database
		$user->GetUser($user->username);
		
		// Print user data
		echo "<h2>Let the game begin!</h2>";
		echo "You are logged in as:<br/>";
		$user->ShowUser();
		echo "<br><br>";
		echo '<a href="?logout=true">Logout</a>';
	}
	?>
</body>
</html>
