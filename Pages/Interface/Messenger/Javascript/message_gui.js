function sendMessage() {
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
