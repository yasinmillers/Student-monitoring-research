
<body class="login">
<?php include 'partials/nav.php'; ?>
<?php include 'connect.php'; ?>

<?php

session_start ();
include("connect.php"); 

if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
// if(isset($_REQUEST['sub']))
// {
// $a = $_REQUEST['email'];
// $b = $_REQUEST['password'];

// $res = mysqli_query($cser,"select* from students where email='$a'and password='$b'");
// $result=mysqli_fetch_array($res);
// if($result)
// {
	
// 	$_SESSION["login"]="1";
// 	header("location:index.php");
// }
// else	
// {
// 	header("location:login.php?err=1");
	
// }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <form action="login.php" method="POST">
        <h1>Login</h1>
        <div>
            <label for="username">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit" name="sub">Login</button>
            <a href="registerstudent.php">Register as Student</a>
        </section>

        <?php 
if(isset($_REQUEST["err"]))
	$msg="Invalid username or Password";
?>
<p style="color:red;">
<?php if(isset($msg))
{
	
echo $msg;
}
?>

</p>
    </form>
</main>
</body>
</html>
<?php include 'partials/foot.php'; ?>
