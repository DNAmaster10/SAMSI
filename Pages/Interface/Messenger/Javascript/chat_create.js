function getUsers(){
    input_user = document.getElementById("user_entry_box").value;
    $.ajax({                                      
        url: './get_users.php',       
        type: "POST",
        data: {username_entry:input_user},
        success: function(data) {
            console.log(data);
			document.getElementById("user_buttons").innerHTML = data;
        }
    });
}
function addUser(val) {
	console.log(val);
}