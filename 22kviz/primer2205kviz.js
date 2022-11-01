
function dodajPitanja() {
    window.open("primer2201pitanja.html")
}

let pitanja = null;
let mojiOdgovori = null;
let trenutnoPitanje = null;

function izmesajUporedi(odgovor0, odgovor1) {
    // >0
    return 0.5 - Math.random();  // (-0.5, 0.5]
}

function prikaziPitanje(index) {
    const items = pitanja[index].split(";");
    const tekstPitanja = items[0];
    const odgovori = items.slice(1);
    const main = document.getElementById("main");

    main.innerHTML = "";
    /**
     * <h1>tekstPitanja</h1>
     * <br>
     * <ul>
     *  <li>answer0</li>
     *  <li>answer1</li>
     * ...
     * </ul>
     */

    const h1 = document.createElement("h1");
    h1.innerHTML = tekstPitanja;
    main.appendChild(h1);

    const noviRed = document.createElement("br");
    main.appendChild(noviRed);

    const ul = document.createElement("ul");
    main.appendChild(ul);

    odgovori.sort(izmesajUporedi);

    for (const odgovor of odgovori) {
        const li = document.createElement("li");
        li.innerHTML = odgovor;
        ul.appendChild(li);
        li.setAttribute("onclick", "sledecePitanje(\"\")");
    }

    const li = document.createElement("li");
    li.innerHTML = "Preskoci";
    ul.appendChild(li);
    li.setAttribute("onclick", "sledecePitanje(\"\")");
}

function izracunajRezultat() {
    let poeni = 0;
    for (let i = 0; i < pitanja.length; i++) {
        const tacanOdgovor = pitanja[i].split(";")[1];

        if (mojiOdgovori[i] == "") {
            // continue;

            if (mojiOdgovori[i] == tacanOdgovor) {
                poeni++;
            } else if (mojiOdgovori[i] != tacanOdgovor && mojiOdgovori) {
                poeni--;
            }
        }
        alert("Vaš rezultat: " + poeni);
    }
}

function sledecePitanje(odgovor) {
    mojiOdgovori.push(odgovor);
    trenutnoPitanje++;
    // console.log(mojiOdgovori);

    if (trenutnoPitanje == pitanja.length) {
        izracunajRezultat();
    } else {
        prikaziPitanje(trenutnoPitanje);
    }
}

function pocniKviz() {
    const lsPitanja = localStorage.getItem("pitanja");
    pitanja = lsPitanja.split("#");
    mojiOdgovori = [];
    trenutnoPitanje = [];
    prikaziPitanje(0);
}