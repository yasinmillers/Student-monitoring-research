
<body class="login">
<?php include 'partials/nav.php'; ?>
<?php include 'connect.php'; ?>


<?php

include("connect.php"); 


if(isset($_POST["err"]))
	$msg="Invalid username or Password";
?>
<p style="color:red;">
<?php if(isset($msg))
{
	
echo $msg;
}
?>

</p>
<?php
if(isset($_POST['sub']))
 {
 $a = $_POST['email'];
 $b = $_POST['password'];
if(!empty($a) && !empty($b) ){

 $res = mysqli_query($cser,"select* from students where email='$a'and password='$b' limit 1");
 $result=mysqli_fetch_array($res);
 if($result)
 {
	
 	header("location:index.php");
 }
 else	
 {
 	header("location:login.php?err=1");
	
 } }

}
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
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit" name="login">Login</button>
            <a href="registerstudent.php">Register as Student</a>
        </section>

    </form>
</main>
</body>
</html>
<?php include 'partials/foot.php'; ?>
