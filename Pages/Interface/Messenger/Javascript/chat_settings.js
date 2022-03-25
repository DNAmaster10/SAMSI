function addUser() {
    var username = document.getElementById("add_member_entry_box").value;
    $.ajax({                                      
        url: './chat_settings_add_user.php',       
        type: "POST",
        data: {username:username},
        success: function(data) {
            console.log(data);
        }
    });
}
