function stoperica() {
    alert("Добродошли!");
    let vreme = 0;

    // TODO: na svaki minut iskače obaveštenje o vremenu provedenom na sajtu
    // inicijalizuj brojanje vremena od 0
    // sekunde pretvori u minute
    // setInterval
    // alert ("Na sajtu ste proveli" + vreme + "minuta");

    setInterval(function () {
        // alert("Your time is ticking");
        vreme++;
        // time = 67s;
        let sekunde = vreme % 60;
        let minute = Math.floor(vreme / 60);

        document.getElementById("vreme").innerHTML =
            (minute < 10 ? "0" : "") + minute + "." +
            (sekunde < 10 ? "0" : "") + sekunde;
    }, 1000);
    alert("Na sajtu ste proveli" + vreme + "minuta");
}

function proveriMejl() {
    var mejl = document.getElementById("email").value;
    // alert(mejl);
    var reg = new RegExp("^([a-z0-9_\\.-]+)@([a-z]+\\.)+[a-z]{2,10}$", "i");
    var match = mejl.match(reg);
    // alert(match);
    return match != null;
}

function proveriTel() {
    var tel = document.getElementById("tel");
    var reg = new RegExp("^\\+?(\\(\\d+\\)|\\d+/?)[\\d ]+$");
    var pos = tel.search(reg);
    return pos != -1;
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
    if (!proveriTel())
        poruka += "Телефон није у исправном формату. ";
    if (!proveriPoruku())
        poruka += "Нисте унели поруку. ";
    if (poruka == "")
        poruka = "Честитамо. Успешно сте послали поруку. ";
    document.getElementById("poruka").innerHTML = poruka;
}

// TODO: localStorage
// sačuvaj poruke u localStorage
// svaka poruka da ima ID
// poruke se čuvaju u nizu
// prikaz poruka sortiranih po imejl adresi

// ideja:
// povezati formu da poruke šalje na imejl adresu
// ne može:
// izvor: https://html.form.guide/email-form/html-email-form/
// izvor: https://www.emailjs.com/docs/tutorial/creating-contact-form/
// kroz bek može, kod Nebojše to radili kroz Javu prošle godine