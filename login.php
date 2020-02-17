<?php 
include_once'config/config.php';
session_start();
$login_error="";
if (isset($_POST)& !empty($_POST)) {
// receive all input values from the form
  	$Email = mysqli_real_escape_string ($conn, $_POST['Email']);
  	$Password = mysqli_real_escape_string ($conn, $_POST['Password']);

    $sql="SELECT * FROM `users` WHERE Email='$Email' AND Phone_No='$Password'";

     
 	$result =mysqli_query($conn,$sql);
 	$rows = mysqli_num_rows($result);
 	if($rows == 1){
        $_SESSION['loggedin'] = $Email;
        echo $_SESSION['loggedin'];;
          header("location:index.php");

    }else {
    	$login_error="invalid Username or Password "; 
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<style type="text/css">
	body {
	background-image: url(img/pic.png);
	background-repeat: repeat;
}
    </style>
<meta charset="utf-8">
</head>
<body>

    <form action="login.php" method="POST" enctype="Multipart/form-data">
	    <div class="login-box">
		  <img src="img/avatar.png" class="avatar">
		  <h1> login here </h1>
		  <p> Username</p>
		  <input type="Email" name="Email" placeholder="Enter Email" required>
		  <p> Password</p>
		  <input type="Password" name="Password"  placeholder="Enter Password" required ></br>
		  <div class="login_error"> <?php echo $login_error;?></div>

		   <input type="submit" name="submit" value="login">
	    </div>
    </form>
</body>
</html> 