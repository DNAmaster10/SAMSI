<?php
	#connect to database
  include "/var/www/html/Includes/dbh.php";
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $error = 0;
  
  #check if username / password is too long
  $usernameLength = strlen($username);
  $passwordLength = strlen($password);
  
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
  $sql_check_username = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
  $result_check_username = mysqli_query($conn, $sql_check_username);
  
  if (mysqli_num_rows($result_check_username) > 0) {
	$_SESSION["logged_in"] = "yes";
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
  }
  
  if $error == 0 {
	  echo ("
	  <html>
		<head>
			<title>Samsi</title>
		</head>
		<body>
			<p>Logged in successfully. redirecting</p>
		</body>
			<script>
			window.location.href = '/Interface/main_menu.php';
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
			<p>".$textOutput."</p>
		</body>
			<script>
			window.location.href = '/Interface/main_menu.php';
			</script>
	  </html>");
  }
  
?>