<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/Includes/Css/main.css"></link>
		<title>Samsi</title>
	
		<style>
		body {
  			margin: 0;
		}

		.header {
  			background-color: #af93d7;
  			padding: 20px;
  			text-align: center;
		}
</style>
	</head>
    	<body>
        	<h1>Welcome to Samsi</h1>
        	<form action="/Pages/Login/login.php">
           		<input type="button" onclick="location.href='/Pages/Login/login.php';" value="Login" />
        	</form>
        	<form action="/Pages/register.php">
            		<input type="button" onclick="location.href='/Pages/Register/register.php';" value="Register an admin account" />
        	</form>
		<br>
		<img src="/Includes/Images/logo_text.png" alt="Logo_text">
		<div class="footer">
  			<p>Pre-alpha v 0.0.2 - All rights reserved  THE SAMSI CORPORATION</p>
		</div>

    </body>
</html>
