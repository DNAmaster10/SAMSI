<!DOCTYPE html>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<html>
  <title>Login</title>
  <body>
    <p>Enter the name of your school bellow in full</p>
    <br>
    <input type="text" id="school_text" name="school_txt" onkeyup="check_school()">
    <p id="output_field">School does not exist</p>
    
    <script>
    var result = ("");
    function check_school() {
    console.log("Checking if school exists");
    $.ajax({
      url: 'checkSchool.php',
      type: 'POST',
      dataType:'json',
      data: { 'post_var':document.getElementById("school_text").value; },
      success: function(data) {
      console.log(data);
      result = data;
      document.getElementById("output_field").innerHTML = (result);
    }
    });
    }
    </script>
  </body>
</html>
