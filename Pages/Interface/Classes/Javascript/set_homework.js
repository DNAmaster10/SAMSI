const d = new Date();
var year = d.getFullYear();
var month = d.getMonth();
var day = d.getDay();
year = year.toString();
month = month.toString();
day = day.toString();
var full_date = day + month + year;
document.getElementById("submit_date").value = full_date;
