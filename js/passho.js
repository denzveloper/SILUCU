function show(){
    var p = document.getElementById('pwd');
    var b = document.getElementById('show');
    p.setAttribute('type', 'text');
    p.style.color = "#fff";
    p.style.backgroundColor = "#FF6347";
    b.style.backgroundColor = "#0099ff";
    b.style.color = "#fff";
}
function hide(){
    var p = document.getElementById('pwd');
    var b = document.getElementById('show');
    p.setAttribute('type', 'password');
    p.style.color = "#333";
    p.style.backgroundColor = "#fff";
    b.style.backgroundColor = "#fff";
    b.style.color = "#0099ff";
}
var pwShown = 0;
document.getElementById("show").addEventListener("click", function () {
    if (pwShown == 0){
        pwShown = 1;
        alertingme();
        show();
    }else{
        pwShown = 0;
        hide();
    }
}, false);

function alertingme(){
 var el = document.createElement("div");
 duration = 2500;//durasi dalam milidetik
 el.setAttribute("style","position:fixed;top:50%;left:30%;background-color:#FF6347;text-shadow: 3px 3px 2px rgba(0, 0, 0, 0.2);border: 1px solid #ccc;");
 el.innerHTML = "Kata sandi Terlihat! Pastikan Anda mengetiknya dengan Aman!";
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}

var nocol = 0;
function chgbg(){
    var bck = document.getElementById("back");
    var t = document.getElementById('thm');
    if (nocol == 0){
        nocol = 1;
        bck.style.backgroundColor = "#ddd";
        bck.style.color = "#000";
        t.style.color = "#999";
    }
    else if(nocol == 1){
        nocol = 2;
        bck.style.backgroundColor = "#5fba7d";
        bck.style.color = "#fff";
        t.style.color = "#999";
    }
    else if(nocol == 2){
        nocol = 3;
        bck.style.backgroundColor = "#555";
        t.style.color = "#999";
    }
    else if(nocol == 3){
        nocol = 4;
        bck.style.backgroundColor = "#ff7f50";
        t.style.color = "#999";
    }
    else{
        nocol = 0;
        bck.style.backgroundColor = "#0099ff";
        t.style.color = "#999";
    }
}