<?php
	#connect to database
  include "/var/www/html/Includes/dbh.php";
  
  $username_t = $_GET["username"];
  $password_t = $_GET["password"];
  
  $error = 0;
  
  #check if username / password is too long
  $usernameLength = strlen($username_t);
  $passwordLength = strlen($password_t);
  
  if ($usernameLength > 25) {
    $error = (1);
  }
  
  if ($passwordLength > 25) {
    $error = (1);
  }
  
  if ($error == 1) {
    $textOutput = ("The entered username or password is too long (maximum of 25 characters allowed.");
  }
  
  #check if username exists in database
  $sql_check_username = "SELECT * FROM users WHERE username='".$username_t."' AND password='".$password_t."'";
  $result_check_username = mysqli_query($conn, $sql_check_username);
  
  if (mysqli_num_rows($result_check_username) > 0) {
	$_SESSION["logged_in"] = "yes";
	$_SESSION["username"] = $username_t;
	$_SESSION["password"] = $password_t;
  }
  
  else {
	  $textOutput = "That username and password combination is not recognised";
	  $error = (2);
  }
  
  if ($error == 0) {
	  echo ("
	  <html>
		<head>
			<title>Samsi</title>
		</head>
		<body>
			<p>Logged in successfully. redirecting</p>
		</body>
			<script>
			window.location.href = '/Pages/Interface/main_menu.php';
			</script>
	  </html>
	  ");
  }
  else {
	echo ("
		  <html>
		<head>
			<title>Samsi</title>
		</head>
		<body>
			<p>".$textOutput."</p><br>
			<form action='/Pages/Login/login.php'>
				<input type='submit' value='Go Back'>
			</form>
		</body>
	  </html>");
  }
  
?>