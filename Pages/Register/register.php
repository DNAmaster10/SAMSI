<!DOCTYPE html>
<html>
  <head>
    <title>SAMSi</title>
    <link rel="stylesheet" href="/Includes/Css/main.css">
  </head>
  <body>
    <form action="/Pages/Register/schoolRegComplete.php" method="POST">
      <p>School Name:</p> <input type="text" name="schoolName"><br>
      <p>Admin Account Name:</p> <input type="text" name="adminName" required><br>
      <p>Admin Account Password:</p> <input type="text" name="adminPassword" required>
      <input type="submit" value="register">
    </form>
  </body>
</html>
