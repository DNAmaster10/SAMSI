function getUsers(){
    input_user = document.getElementById("user_entry_box").value;
    $.ajax({                                      
        url: './get_users.php',       
        type: "POST",
        data: {username_entry:input_user},
        success: function(data) {
			document.getElementById("user_buttons").innerHTML = data;
        }
    });
}
function addUser(val) {
	var current_members = document.getElementById("members").value;
	var new_members = current_members + "," + val;
	var current_members_list = document.getElementById("members_list").innerHTML;
	var new_members_list = current_members_list + "<br>" + val;
	document.getElementById("members_list").innerHTML = new_members_list;
	document.getElementById("members").value = new_members;
}