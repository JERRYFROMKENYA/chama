//obtain UTC date and store in varible
d = new Date;
//extract Hour from date and store in variable 
a = d.getHours();
//control structure to determine what greeting to use
if (a<12)
document.getElementById("greeting").innerHTML = "Good Morning";
if (a>11)
document.getElementById("greeting").innerHTML = "Good Afternoon";
if (a>15)
document.getElementById("greeting").innerHTML = "Good Evening";
if(a>19 && a<23)
document.getElementById("greeting").innerHTML = "Good Evening, Have a nice night!";
//use it after where you've defined the ID
/*Who said I did what? What did they do?*/
//Sign : Jerry Ocheing
//LOL learn this insted of copy pasting my work...


