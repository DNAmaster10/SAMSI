<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="/Includes/Css/main.css">
  <link rel="stylesheet" href="/Includes/Css/Themes/default.css">
  <title>Login</title>
  <style>
    body, html{
	width: 100%;
    }
 body {
 background-image: url("./MicrosoftTeams-image.png");
 background-color: #cccccc;
 background-position: contain;
 background-repeat: no-repeat;
 background-size: cover;
 margin: auto;
 padding: 0;
 background-size: 100%;
}
    .login_box {
		display: block;		
		margin-top: 10%;
		margin-bottom: 50%;
		margin-right: 10%;
		margin-left: 60%;	    
        width: 15%;
		background-color: rgba(0, 34, 56, 0.9);
		text-align: center;
		border-radius: 25px;
		height: 50%;
		padding: 5%;
    }
	p {
		color: white;
	}
	 
	h3 {
		color: white;
	  }
	 .small_block_button {
	background-color: #b3e3ff;
	border: 2px solid #000000;
	color: #000000;
	transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}
.small_block_button:hover {
	background-color: #84b5d1;
	color: #ffffff;
}
    </style>
	<link rel="stylesheet" href="/Includes/Css/main.css">
  </head>
  <body>
    <div class="login_box">
		<h3>Enter Your Login Credidentials Below</h3>
		<br>
		<form action="/Pages/Login/login_submit.php" method="POST" class="submit_forum">
			<p>Username: </p><input type="text" id="username_text_box" name="username" placeholder="Username" required><br>
			<p>Password: </p><input type="text" id="password_text_box" name="password" placeholder="Password" required><br>
			<input type="submit" value="Login" class="small_block_button">
			<br>
		</form>
	    <form action="/index.php" class="submit_forum">
            <input type="submit" value="Home" class="small_block_button">
        </form>
    </div>
  </body>
</html>
