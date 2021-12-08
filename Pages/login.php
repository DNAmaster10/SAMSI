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
    var schoolEntry = document.getElementById("school_text").innerHTML;
    function check_school() {
    console.log("Checking if school exists");
    schoolEntry = document.getElementById("school_text").innerHTML;
    $.ajax({
      url: 'checkSchool.php',
      type: 'POST',
      dataType:'html',
      data: {"post_var":document.getElementById("school_text").innerHTML},
      success: function(data) {
      console.log(data);
      result = data;
    }
    });
    document.getElementById("output_field").innerHTML = (result);
    }
    </script>
  </body>
</html>
