<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/Includes/Css/main.css"></link>
		<title>SAMSi</title>
	
		<style>
		body {
  			margin: 0;
		}

		.header {
  			background-color: #af93d7;
  			padding: 50px;
  			text-align: center;
		}
</style>
	</head>
    	<body>
        	<div class="header">
			<img src="/Includes/Images/logo_text.png" alt="Logo_text"></img>
		</div>
        	<form action="/Pages/Login/login.php">
           		<input type="button" onclick="location.href='/Pages/Login/login.php';" value="Login" />
        	</form>
        	<form action="/Pages/register.php">
            		<input type="button" onclick="location.href='/Pages/Register/register.php';" value="Register an admin account" />
        	</form>
		<br>
		<div class="footer">
  			<p>Pre-alpha v 0.0.4 - All rights reserved  THE SAMSI CORPORATION</p>
		</div>

    </body>
</html>
