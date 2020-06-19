var URL = window.URL || window.webkitURL || window.mozURL;

function uploadImg(e, dom) {
    var e = event || e;
    var fileObj =
        dom instanceof HTMLElement
            ? dom.files[0]
            : $(dom)[0].files[0];
    console.log(e);
    console.log(dom);
    var container = document.querySelector('.preview');
    var img = new Image();
    img.src = URL.createObjectURL(fileObj);
    img.onload = function () {
        container.appendChild(img)
    }

}