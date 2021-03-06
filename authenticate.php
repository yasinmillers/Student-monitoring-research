<?php
require_once "connect.php";

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id, password FROM students WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();


    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (md5(($_POST['password'])==$password)) {
            // Verification success! User has logged-in!
            	header("location:App/welcome.php");
        } else {
            // Incorrect password
            echo 'Incorrect pass ';
        }
    } else {
        // Incorrect email
        echo 'Incorrect  email';
    }

	$stmt->close();
}
?>
