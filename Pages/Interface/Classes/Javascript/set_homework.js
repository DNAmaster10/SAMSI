const d = new Date();
var year = d.getFullYear();
var month = d.getMonth();
month = month + 1;
var day = d.getDate();
year = year.toString();
month = month.toString();
day = day.toString();
var full_date = day + "-" + month + "-" + year;
document.getElementById("submit_date").value = full_date;
