<?php
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
  $sql_check_username_admin = "SELECT * FROM admin_users WHERE username='".$adminName."'";
  $result_check_username_admin = mysqli_query($conn, $sql_u);
  
  if (mysqli_num_rows($res_u) > 0) {
	  $continue = 0;
	  $textOutput = ("That username is already in use!");
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