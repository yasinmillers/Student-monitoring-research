
<?php
require_once "connect.php";
if (isset($_POST['signup'])) {
$name = mysqli_real_escape_string($conn, $_POST['name']);
$regno = mysqli_real_escape_string($conn, $_POST['regno']);
$program = mysqli_real_escape_string($conn, $_POST['program']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
$name_error = "Name must contain only alphabets and space";
}
if (!preg_match("/[^A-Za-z0-9]+/",$regno)) {
    $regno_error = "contain only alphabets and number";
}
if (!preg_match("/^[a-zA-Z ]+$/",$program)) {
    $program_error = "program must contain only alphabets and space";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if(strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}       
if(strlen($mobile) < 10) {
$mobile_error = "Mobile number must be minimum of 10 characters";
}
if($password != $cpassword) {
$cpassword_error = "Password and Confirm Password doesn't match";
}
if (!$error) {
if(mysqli_query($conn, "INSERT INTO students(name,regno,program, email, mobile ,password) VALUES('" . $name . "', '" . $regno . "','" . $program . "','" . $email . "', '" . $mobile . "', '" . md5($password) . "')")) {
header("location: registerstudent.php");
exit();
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Registration Form in PHP with Validation | Tutsmake.com</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'partials/nav.php'; ?>
<div class="container">
<div class="row">
<div class="col-lg-8 col-offset-2">
<div class="page-header">
<h2>Student Registration</h2>
</div>
<p>Get registered to submit your research papers</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control" value="" maxlength="50" required="">
<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
</div>
<div class="form-group">
<label>RegNo</label>
<input type="text" name="regno" class="form-control" value="" maxlength="50" required="">
<span class="text-danger"><?php if (isset($regno_error)) echo $regno_error; ?></span>
</div>
<div class="form-group">
<label>Program</label>
<input type="text" name="program" class="form-control" value="" maxlength="50" required="">
<span class="text-danger"><?php if (isset($program_error)) echo $program_error; ?></span>
</div>
<div class="form-group ">
<label>Email</label>
<input type="email" name="email" class="form-control" value="" maxlength="30" required="">
<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
</div>
<div class="form-group">
<label>Mobile</label>
<input type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
<span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
</div>  
<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
</div>


<input type="submit" class="btn btn-primary" name="signup" value="submit">
Already have a account?<a href="login.php" class="btn btn-default">Login</a>
</form>
</div>
</div>    
</div>
</body>
</html>