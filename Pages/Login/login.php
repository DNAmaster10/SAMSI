<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="/Includes/Css/main.css">
  <title>Login</title>
  <style>
    body, html{
    height: 95%;
	width: 100%;
    }
 body {
 background-image: url("./MicrosoftTeams-image.png");
 background-color: #cccccc;
 background-position: center;
 background-repeat: no-repeat;
 background-size: cover;
}
    .login_box {
		display: block;		
	    	margin-top: 20%;
  		margin-bottom: 50%;
 		margin-right: 10%;
  		margin-left: 70%;	    
           	width: 20%;

      background-color: rgba(0, 34, 56, 0.9);
      text-align: center;
	  border-radius: 25px;
	  height: 50%;
	  padding: 10%;
    }
	p {
		color: white;
	}
	 
	h3 {
		color: white;
	  }
	 
	.submit_forum {
		display: inline-block;
	}
    </style>
  </head>
  <body>
    <div class="login_box">
		<h3>Enter Your Login Credidentials Below</h3>
		<br>
		<form action="/Pages/Login/login_submit.php" method="POST" class="submit_forum">
			<p>Username: </p><input type="text" id="username_text_box" name="username" required><br>
			<p>Password: </p><input type="text" id="password_text_box" name="password" required><br>
			<input type="submit" value="Login" class="block_button">
			<br>
		</form>
	    <form action="/index.php" class="submig_forum">
            <input type="submit" value="Home" class="block_button">
        </form>
    </div>
  </body>
</html>
