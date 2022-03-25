function sendUser() {
    var username = document.getElementById("add_member_entry_box").value;
    $.ajax({                                      
        url: './chat_settings_add_user.php',       
        type: "POST",
        data: {username:username},
        success: function(data) {
            if (data == 1) {
                console.log("User is not admin");
                document.getElementById("return_message_container").innerHTML = "You are not an admin!";
            }
            else if (data == 2) {
                console.log("User is already a member of chat");
                document.getElementById("return_message_container").innerHTML = "That user is already a member of this chat!";
                document.getElementById("add_member_entry_box").value = "";
            }
            else if (data == 3) {
                var username = document.getElementById("add_member_entry_box").value;
                console.log("User successfully added to database");
                document.getElementById("return_message_container").innerHTML = "User successfuly added to chat!";
                document.getElementById("add_member_entry_box").value = "";
                var current_member_list = document.getElementById("members_list").innerHTML;
                var new_member_list = current_member_list + "<br>" + username; 
            }
            else if (data == 4) {
                console.log("Please enter a valid input!");
                document.getElementById("return_message_container").innerHTML = "Please enter a valid input";
            }
            else {
                console.log("A major error occured at the server end");
            };
        }
    });
}
function getUsers(){
    input_user = document.getElementById("add_member_entry_box").value;
    $.ajax({                                      
        url: './get_users.php',       
        type: "POST",
        data: {username_entry:input_user},
        success: function(data) {
			document.getElementById("new_member_button_list").innerHTML = data;
        }
    });
}
function addUser(val){
    document.getElementById("add_member_entry_box").value = val;
}
