<!DOCTYPE html>
<html>
  <head>
  <title>Messenger</title>
  </head>
  <body>
    <p>Enter your message in the box bellow</p>
    <input type="text" id="input_message" name="message_entry" onkeyup="send_message()">
    <br>
    <p id="message_output_field">Current message: <?php $message_file = fopen("message_file.txt","r") or die ("Unable to open message file!");
      echo fgets($message_file);
      fclose ($message_file);
      
      ?> </p>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script type="text/javascript" src="/Scripts/messenger.js"></script>
  </body>
</html>
