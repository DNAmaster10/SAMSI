function addUser() {
    var username = document.getElementById("add_member_entry_box").value;
    $.ajax({                                      
        url: './chat_settings_add_user.php',       
        type: "POST",
        data: {username:username},
        success: function(data) {
            if (data == 1) {
                console.log("User is not admin");
            };
            elseif (data == 2) {
                console.log("User is already a member of chat");
            };
            elseif (data == 3) {
                console.log("User successfully added to database");
            };
            else {
                console.log("A major error occured at the server end");
            };
        }
    });
}
