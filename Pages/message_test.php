<!DOCTYPE html>
<html>
  <head>
  <title>Messenger</title>
  </head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
  </script>
  <body>
    <p>Enter your message in the box bellow</p>
    <input type="text" id="input_message" name="message_entry" onkeyup="send_message()">
    <br>
    <p id="message_output_field">Current message: <?php $message_file = fopen("message_file.txt","r") or die ("Unable to open message file!");
      echo fgets($message_file);
      fclose ($message_file);
      
      ?> </p>
  </body>
  <script src="script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
       function send_message() {
   console.log("Sending message to server");
    $.ajax({
      url: 'save_message.php',
      type: 'POST',
      dataType:'json',
      data: {'sent_message':document.getElementById("input_message").value},
      success: function(data) {
      console.log("Message successfully sent!");
    }
    });
    } 
    var function request_messages() {
    $.ajax({
      url: "request_message.php",
      type: "POST",
      dataType:"json",
      success: function(recieved_message) {
      console.log("Message recieved successfully!");
      document.getElementById("message_output_field").innerHTML = ("Current message: " + recieved_message);
      }
      });
    }
    var i = 1;                  

    function myLoop() {       
      setTimeout(function() {  
        console.log('Fetching messages');  
        request_messages()
        i++;                
        if (i > 0) {         
          myLoop();          
        }                      
     }, 1000)
    }

    myLoop();                
  </script>
</html>
