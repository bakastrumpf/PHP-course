// pitanje0;tacanOdgovor0;odgovor1;odgovor2;odgovor3#

function dodajPitanja() {
    const textarea = document.getElementById("pitanja");
    const text = textarea.value;

    console.log(text);

    const pitanja = text.split("(Q)").slice(1);
    // console.log(pitanja, text);
    let lsPodatak = localStorage.getItem("pitanja")

    for (const pitanje of pitanja) {
        let tekstPitanja = "";
        let tacanOdgovor = "";
        let odgovori = [];
        const linije = pitanje.split("\n");
        // console.log(pitanje.split("\n"))

        for (let i = 0; i < linije.length; i++) {
            if (i == 0) {
                tekstPitanja = linije[i];
            } else if (linije[i].startsWith("(AA)")) {
                tacanOdgovor = linije[i].replace("(AA)", "");
            } else if (linije[i].startsWith("(A)")) {
                odgovori.push(linije[i].replace("(A)", ""));
            }
        }
        // console.log(tekstPitanja);
        // console.log(tacanOdgovor);
        // console.log(odgovori);

        let podatak = tekstPitanja + ";" + tacanOdgovor;
        for (let i = 0; i < odgovori.length; i++) {
            podatak += ";" + odgovori[i];
        }

        // console.log(podatak);

        if (lsPodatak == null) {
            lsPodatak = podatak;
        } else {
            lsPodatak += "#" + podatak;
        }
    }
    // console.log(lsPodatak);
    localStorage.setItem("pitanja", lsPodatak);
}