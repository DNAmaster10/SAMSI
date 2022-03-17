var start = new Date(document.getElementById('Stardate').value);
var year = getFullYear();
var month = getMonth();
var day = getDay();
document.getElementById("submit_date").value = new Date(day,month,year);
