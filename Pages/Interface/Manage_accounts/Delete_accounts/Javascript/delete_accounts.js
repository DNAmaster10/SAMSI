function getUsers() {
    var user_input = document.getElemenetById("username_input_box").value;
    $.ajax({
        url: './get_users.php',
        type: "POST",
        data: {username:user_input},
        success: function(data) {
            document.getElementtById("
        }
    });
}
