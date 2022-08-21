<?php
 
  $link = mysqli_connect("localhost", "root", "", "mms");
 
  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  session_start();
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_login WHERE username='$username' AND password='$password'"; 
    $resultSet = mysqli_query($link , $sql);
    
    if(mysqli_num_rows($resultSet) > 0){
        $row = mysqli_fetch_assoc($resultSet);
        if($row['username'] == $username && $row['password'] == $password){ 
        	$_SESSION['uname'] = $username;
        	$_SESSION['pass'] = $password;
        	
            header('Location:index.php');
        }else{
            // echo "<script> alert('Incorrect inputs') </script>";
        }
    }else{
        //echo "Wrong Email or Password!";
    }


    // echo $tempUN;
  }

  

  // Close connection
  mysqli_close($link);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/7.jpg');">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
					<span class="login100-form-title-1" style="font-family: Lucida Console; font-size: 50px;">
						<b>Sign In</b> 
					</span>
				</div>

				<form class="login100-form validate-form" style="font-family: Lucida Console;" method="post" >
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100"><b>Username</b></span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required" >
						<span class="label-input100"><b>Password</b></span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn"  style="font-family: Lucida Console; font-size: 30px;" name="login" type="submit">
						<b>Login</a></b>
						</button>						
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>

</body>
</html>