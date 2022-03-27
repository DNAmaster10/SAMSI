function sendMessage() {
    $("#send_message_container").click(function() {
        $('.transform').toggleClass('send_message_button_active');
    });
    input_message = document.getElementById("message_entry").value;
    document.getElementById("message_entry").value = "";
    $.ajax({                                      
        url: './send_message_handle.php',       
        type: "POST",
        data: {message:input_message},
        success: function(data) {
            console.log(data);
        }
    });
}
function getMessages() {
    $.ajax({                                      
        url: './get_message_handle.php',       
        type: "POST",
        success: function(data) {
            document.getElementById("message_p").innerHTML = data;
        }
    });
}
function loadMore() {
    $.ajax({                                      
        url: './load_more.php',       
        type: "GET",
        success: function(data) {
			var first = "Now loading";
			var second = "messages.";
			var final_string = first.concat(" ", data);
			var final_string = final_string.concat(" ", second);
            console.log(final_string);
        }
    });
}

var i = 1;                 

function getMessageLoop() {         
  setTimeout(function() {   
    getMessages();
    i++;                    
    if (i = 100000000000000) {           
      getMessageLoop();             
    }                       
  }, 500)
}

getMessageLoop();                   
