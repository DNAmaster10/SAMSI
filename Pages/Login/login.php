<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="/Includes/Css/main.css">
  <title>Login</title>
  <style>
    body, html{
    height: 100%;
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
	    	margin-top: 100px;
  		margin-bottom: 100px;
 		margin-right: 100px;
  		margin-left: 750px;	    
           	width: 20%;

      background-color: #ffffff;
      text-align: center;
	  border-radius: 25px;
	  height: 50%;
	  padding: 30px;
    }
	p {
		color: white;
	}
    </style>
  </head>
  <body>
    <div class="login_box">
    <p>Enter your login credidentials bellow</p>
    <br>
    <form action="/Pages/Login/login_submit.php">
        <p>Username: </p><input type="text" id="username_text_box" name="username"><br>
        <p>Password: </p><input type="text" id="password_text_box" name="password"><br>
        <input type="submit" value="Login">
    </form>
    </div>
  </body>
</html>
