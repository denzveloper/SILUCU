function show(){
    var p = document.getElementById('pwd');
    var b = document.getElementById('show');
    p.setAttribute('type', 'text');
    b.style.backgroundColor = "#0099ff";
    b.style.color = "#fff";
}
function hide(){
    var p = document.getElementById('pwd');
    var b = document.getElementById('show');
    p.setAttribute('type', 'password');
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
 duration = 1300;//durasi dalam milidetik
 el.setAttribute("style","position:fixed;top:50%;left:30%;background-color:#FF6347;color:#fff;text-shadow: 3px 3px 2px rgba(0, 0, 0, 0.2);border: 1px solid #ccc;");
 el.innerHTML = "Kata sandi Terlihat! Pastikan Anda mengetiknya dengan Aman!";
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}

function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
        }
      return true;
}