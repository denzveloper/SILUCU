function show() {
    var p = document.getElementById('pwd');
    var b = document.getElementById('show');
    p.setAttribute('type', 'text');
    p.style.color = "#fff";
    p.style.backgroundColor = "#F89853";
    b.style.backgroundColor = "#0099ff";
    b.style.color = "#fff";
}

function hide() {
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
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);

var nocol = 0;
function chgbg() {
    var bck = document.getElementById("back");
    var t = document.getElementById('thm');
    if (nocol == 0) {
        nocol = 1;
        bck.style.backgroundColor = "#5fba7d";
        bck.style.color = "#fff";
        t.style.color = "#999";
    }
    else if(nocol == 1){
        nocol = 2;
        bck.style.backgroundColor = "#0099ff";
        t.style.color = "#999";
    }
    else if(nocol == 2){
        nocol = 3;
        bck.style.backgroundColor = "#555";
        t.style.color = "#999";
    }
    else if(nocol == 3){
        nocol = 4;
        bck.style.backgroundColor = "coral";
        t.style.color = "#999";
    }
    else{
        nocol = 0;
        bck.style.backgroundColor = "#ddd";
        bck.style.color = "#000";
        t.style.color = "#999";
    }
}