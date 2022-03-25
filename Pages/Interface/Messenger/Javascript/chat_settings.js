function addUser() {
    var username = document.getElementById("add_member_entry_box").value;
    $.ajax({                                      
        url: './chat_settings_add_user.php',       
        type: "POST",
        data: {username:username},
        success: function(data) {
            if (data == 1) {
                console.log("User is not admin");
            }
            else if (data == 2) {
                console.log("User is already a member of chat");
            }
            else if (data == 3) {
                console.log("User successfully added to database");
            }
            else if (data == 4) {
                console.log("Please enter a valid input!");
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
