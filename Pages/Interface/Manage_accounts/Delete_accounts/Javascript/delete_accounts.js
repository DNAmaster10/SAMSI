function getUsers() {
    var user_input = document.getElementById("username_input_box").value;
    $.ajax({
        url: './get_users.php',
        type: "POST",
        data: {username:user_input},
        success: function(data) {
            document.getElementById("button_output_field").innerHTML = data;
        }
    });
}
function deleteUser(val) {
    document.getElementById("username_input_box").value = val;
}
