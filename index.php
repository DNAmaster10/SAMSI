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
  			background-color: #002e4d;
  			padding: 0px;
  			text-align: left;
		}
		.buttons {
			text-align: center;
			padding: 5px
		}
		.block_button {
			background-color: #b3e3ff;
			border: 2px solid #000000;
			color: 000000;
			transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}
.block_button:hover {
	background-color: #84b5d1;
	color: #000000;
}
.about_us {
    margin: 5px;
}
</style>
	</head>
    	<body>
        	<div class="header">
			<img src="/Includes/Images/logo_text.png" alt="Logo_text"></img>
		</div>
        	<form action="/Pages/Login/login.php" class="inline_display">
           		<input type="button" onclick="location.href='/Pages/Login/login.php';" value="Login" class="block_button">
        	</form>
		<br>
		<p class="about_us">SAMSi is an open-source school communication platform that manages and stores crucial data about students, teachers, and their classes. Our project is largely based off of Microsoft Teams, with influences from the school management system, iSAMS. Currently, we have developed a login and register system, as well as a dynamic account accountment system. We are currently working on a class management system, which we hope to fully incorporate into our franchise soon.</p>
		<footer>
		<div class="footer">
  			<p>Pre-alpha v 0.0.4 - All rights reserved  THE SAMSI CORPORATION</p>
		</div>
		</footer>

   	 </body>
</html>
