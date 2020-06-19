let time = 0;

function $(id) {
    return document.getElementById(id);
}

function controlDIV() {
    if (time === 0) {
        $("main").style.display="block";
        time++;
    }
}
