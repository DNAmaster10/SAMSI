<!DOCTYPE html>
<html>
  <title>Messenger</title>
  <body>
    <p>Enter your message in the box bellow</p>
    <input type="text" id="input_message" name="message_entry" onkeyup="send_message()">
    <br>
    <p id="message_output_field">Current message: <?php $message_file = fopen("message_file.txt","r") or die ("Unable to open message file!");
      echo fgets($message_file);
      fclose ($message_file);
      
      ?> </p>
  </body>
  <script>
    var result = ("");
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
    
    function request_messages() {
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
    var i = 1;                  //  set your counter to 1

    function myLoop() {         //  create a loop function
      setTimeout(function() {   //  call a 3s setTimeout when the loop is called
        console.log('Fetching messages');   //  your code here
        request_messages()
        i++;                    //  increment the counter
        if (i > 0) {           //  if the counter < 10, call the loop function
          myLoop();             //  ..  again which will trigger another 
        }                       //  ..  setTimeout()
     }, 1000)
    }

    myLoop();                   //  start the loop
  </script>
</html>
