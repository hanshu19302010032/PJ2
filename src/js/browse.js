function select() {
    var select = document.getElementById("select1").value;
    var val = document.getElementById("select2");
    switch (select) {
        case "China" :
            val.innerHTML = '<option value=""> </option><option value="Shanghai">Shanghai</option><option value="Kunming">Kunming</option><option value="Beijing">Beijing</option><option value="Yantai">Yantai</option>';
            break;
        case "Japan" :
            val.innerHTML = "<option value=''> </option><option value='Tokyo'>Tokyo</option><option value='Osaka'>Osaka</option><option value='Kamakura'>Kamakura</option>";
            break;
        case "Italy" :
            val.innerHTML = "<option value=''> </option><option value='Roma'>Roma</option><option value='Milan'>Milan</option><option value='Venice'>Venice</option><option value='Florence'>Florence</option>";
            break;
        case "America" :
            val.innerHTML = "<option value=''> </option><option value='New York'>New York</option><option value='San Francisco'>San Francisco</option><option value='Washington'>Washington</option>";
            break;
        default :
            alert("error");
    }
}