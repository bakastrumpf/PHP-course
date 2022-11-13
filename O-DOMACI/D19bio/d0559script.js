function proveriMejl() {
    var mejl = document.getElementById("email").value;
    // alert(mejl);
    var reg = new RegExp("^([a-z0-9_\\.-]+)@([a-z]+\\.)+[a-z]{2,10}$", "i");
    var match = mejl.match(reg);
    // alert(match); => za tasha@etf.rs => ["tasha@etf.rs", "tasha", "etf."]
    return match != null;
}

function proveriPoruku() {
    var poruka = document.getElementById("poruka").value;
    if (poruka == null)
        return false;
}

function posalji() {
    var poruka = "";
    if (!proveriMejl())
        poruka += "Нисте унели имејл адресу. ";
    if (!proveriPoruku())
        poruka += "Нисте унели поруку. ";
    if (poruka == "")
        poruka = "Честитамо. Успешно сте послали поруку. ";
    document.getElementById("poruka").innerHTML = poruka;
}