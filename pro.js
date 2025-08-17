

var a = document.getElementById("userbtn");
 var b = document.getElementById("adminbtn");
 var c=document.getElementById("regbtn");
 var x = document.getElementById("userlog");
 var y = document.getElementById("adminlog");
 var z=document.getElementById("reglog");

 function userpage() {
     x.style.left = "4px";
     y.style.right = "-520px";
     z.style.bottom="-520px"
     a.className += " white-btn";
     b.className = "btn";
     x.style.opacity = 1;
     y.style.opacity = 0;
     z.opacity=0;
 }

 function adminpage() {
     x.style.left = "-520px";
     y.style.right = "4px";
     z.style.bottom="-520px"
     a.className = "btn";
     b.className += " white-btn";
     x.style.opacity = 0;
     y.style.opacity = 1;
     z.opacity=0;
 }
 function reg(){
     x.style.left = "-580px";
     z.style.bottom = "20px";
     a.className = "btn";
     c.className += " white-btn";
     x.style.opacity = 0;
     z.style.opacity = 1;
 }

/* function usernext(){
     window.open("user.html");
 } */


// function nextuser(){
//  window.open("user.html");
// }




// function nextadmin(){
//  window.open("admin.html");

// }

