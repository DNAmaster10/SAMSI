
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
