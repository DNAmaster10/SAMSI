<!DOCTYPE html>
<html>
  <title>Login</title>
  <body>
    <p>Enter the name of your school bellow in full</p>
    <br>
    <input type="text" id="school_text" name="school_txt" onkeyup="check_school()">
    <p id="output_field">School does not exist</p>
    
    <script>
    var schoolEntry = document.getElementById("school_text").innerHTML;
    function check_school(){
    console.log("Checking if school exists");
    $.ajax({
      url: "checkSchool.php",
      type: "POST",
      data:{"schoolNamePostContainer":schoolEntry}
    }).done(function(returnValue) {
    console.log(returnValue);
    });
    document.getElementById("output_field").innerHTML = (returnValue);
    }
    </script>
  </body>
</html>
