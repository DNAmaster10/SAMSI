<!DOCTYPE html>
<html>
  <title>Login</title>
  <body>
    <p>Enter the name of your school bellow in full</p>
    <br>
    <input type="text" id="school_text" name="school_txt" onkeyup="check_school()">
    <p id="output_field">School does not exist</p>
    
    <script>
    function check_school(){
    var user_input = document.getElementById("school_text").innerHTML
    var result = ("")
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      result = this.responseText
      document.getElementById("output_field").innerHTML = result
    }
    }
    xmlhttp.open("POST", "checkSchool.php?user_input=" + user_input, true)
    xmlhttp.send()
    }
    </script>
  </body>
</html>
