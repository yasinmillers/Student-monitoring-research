
<body class="login">
<?php include 'partials/nav.php'; ?>
<?php include 'connect.php'; ?>

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
    <form action="login.php" method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit">Login</button>
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
<?php

session_start ();
include("connect.php"); 

if(isset($_REQUEST['sub']))
{
$a = $_REQUEST['name'];
$b = $_REQUEST['password'];

$res = mysqli_query($cser,"select* from students where name='$name'and password='$password'");
$result=mysqli_fetch_array($res);
if($result)
{
	
	$_SESSION["login"]="1";
	header("location:index.php");
}
else	
{
	header("location:login.php?err=1");
	
}
}
?>
</p>
    </form>
</main>
</body>
</html>
<?php include 'partials/foot.php'; ?>
