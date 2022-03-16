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
  		margin-left: 800px;	    
           	width: 20%;

      background-color: rgba(0, 34, 56, 0.9);
      text-align: center;
	  border-radius: 25px;
	  height: 50%;
	  padding: 30px;
    }
	p {
		color: white;
	}
	 
	h3 {
		color: white;
	  }
	 
	  .submit_buttom {
	  
	  }
    </style>
  </head>
  <body>
    <div class="login_box">
    <h3>Enter Your Login Credidentials Below</h3>
    <br>
    <form action="/Pages/Login/login_submit.php" method="POST">
        <p>Username: </p><input type="text" id="username_text_box" name="username" required><br>
        <p>Password: </p><input type="text" id="password_text_box" name="password" required><br>
        <input type="submit" value="Login" class="submit_button">
        <br>
        <form action="/index.php">
            <input type="submit" value="Home">
        </form>
    </form>
    </div>
  </body>
</html>
