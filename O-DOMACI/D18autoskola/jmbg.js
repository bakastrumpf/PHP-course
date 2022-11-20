(function() {
    const jmbgHTML = document.getElementById("jmbg-input");
    const check = document.getElementById("check");
    const msg = document.getElementById("msg");
    const osoba = document.getElementById("osoba");
   
    let jmbg,
        dan,
        mesec,
        godina,
        regija,
        jedinstveniBroj,
        kontrolna,
        ispravnaKontrolna;

    function Person(date, month, year, region, sex) {
        this.date = date;
        this.month = month;
        this.year = year;
        this.region = region;
        this.sex = sex;
    }
    function setPerson() {
        godina = "1" + godina;
        switch (regija) {
            case 1:
                regija = "stranci u BiH";
                break;
            case 2:
                regija = "stranci u Crnoj Gori";
                break;
            case 3:
                regija = "stranci u Hrvatskoj";
                break;
            case 4:
                regija = "stranci u Makedoniji";
                break;
            case 5:
                regija = "stranci u Sloveniji";
                break;
            case 6:
                regija = "Nedefinisano mesto rodjenja";
                break;
            case 7:
                regija = "stranci u Srbiji (bez pokrajina)";
                break;
            case 8:
                regija = "stranci u Vojvodini";
                break;
            case 9:
                regija = "stranci u Kosovu";
                break;
            case 10:
                regija = "Banja Luka";
                break;
            case 11:
                regija = "Bihać";
                break;
            case 12:
                regija = "Doboj";
                break;
            case 13:
                regija = "Goražde";
                break;
            case 14:
                regija = "Livno";
                break;
            case 15:
                regija = "Mostar";
                break;
            case 16:
                regija = "Prijedor";
                break;
            case 17:
                regija = "Sarajevo";
                break;
            case 18:
                regija = "Tuzla";
                break;
            case 19:
                regija = "Zenica";
                break;
            case 20:
                regija = "Crna Gora";
                break;
            case 21:
                regija = "Podgorica";
                break;
            case 22:
                regija = "Crna Gora";
                break;
            case 23:
                regija = "Crna Gora";
                break;
            case 24:
                regija = "Crna Gora";
                break;
            case 25:
                regija = "Crna Gora";
                break;
            case 26:
                regija = "Nikšić";
                break;
            case 27:
                regija = "Crna Gora";
                break;
            case 28:
                regija = "Crna Gora";
                break;
            case 29:
                regija = "Pljevlja";
                break;
            case 30:
                regija = "Osijek, Slavonija region";
                break;
            case 31:
                regija =
                    "Bjelovar, Virovitica, Koprivnica, Pakrac, Podravina region";
                break;
            case 32:
                regija = "Varaždin, Međimurje region";
                break;
            case 33:
                regija = "Zagreb";
                break;
            case 34:
                regija = "Karlovac";
                break;
            case 35:
                regija = "Gospić, Lika region";
                break;
            case 36:
                regija = "Rijeka, Pula, Istra and Primorje";
                break;
            case 37:
                regija = "Sisak, Banovina region";
                break;
            case 38:
                regija = "Split, Zadar, Dubrovnik, Dalmacija region";
                break;
            case 39:
                regija = "Hrvatska";
                break;
            case 40:
                regija = "";
                break;
            case 41:
                regija = "Bitolj";
                break;
            case 42:
                regija = "Kumanovo";
                break;
            case 43:
                regija = "Ohrid";
                break;
            case 44:
                regija = "Prilep";
                break;
            case 45:
                regija = "Skoplje";
                break;
                v;
            case 46:
                regija = "Strumica";
                break;
            case 47:
                regija = "Tetovo";
                break;
            case 48:
                regija = "Veles";
                break;
            case 49:
                regija = "Štip";
                break;
            case 50:
                regija = "Slovenija";
                break;
            case 70:
                regija = "Srbija";
                break;
            case 71:
                regija = "Beograd";
                break;
            case 72:
                regija = "Šumadija i Pomoravlje";
                break;
            case 73:
                regija = "Niš";
                break;
            case 74:
                regija = "Južna Morava";
                break;
            case 75:
                regija = "Zaječar";
                break;
            case 76:
                regija = "Podunavlje";
                break;
            case 77:
                regija = "Podrinje i Kolubara";
                break;
            case 78:
                regija = "Kraljevo";
                break;
            case 79:
                regija = "Užice";
                break;
            case 80:
                regija = "Novi Sad";
                break;
            case 81:
                regija = "Sombor";
                break;
            case 82:
                regija = "Subotica";
                break;
            case 83:
                regija = "Vojvodina";
                break;
            case 84:
                regija = "Vojvodina";
                break;
            case 85:
                regija = "Zrenjanin";
                break;
            case 86:
                regija = "Pančevo";
                break;
            case 87:
                regija = "Kikinda";
                break;
            case 88:
                regija = "Ruma";
                break;
            case 89:
                regija = "Sremska Mitrovica";
                break;
            case 90:
                regija = "Kosovo i Metohija";
                break;
            case 91:
                regija = "Priština";
                break;
            case 92:
                regija = "Kosovska Mitrovica";
                break;

            case 93:
                regija = "Peć";
                break;
            case 94:
                regija = "Đakovica";
                break;
            case 95:
                regija = "Prizren";
                break;
            case 96:
                regija = "Kosovsko Pomoravski okrug";
                break;
            case 97:
                regija = "Kosovo i Metohija";
                break;
            case 98:
                regija = "Kosovo i Metohija";
                break;
            case 99:
                regija = "Kosovo i Metohija";
                break;

            default:
                break;
        }

        if (jedinstveniBroj < 500) {
            jedinstveniBroj = "Muški";
        } else {
            jedinstveniBroj = "Ženski";
        }
        var newPerson = new Person(dan, mesec, godina, regija, jedinstveniBroj);
        
        osoba.innerHTML = `Datum rodjenja: ${dan}.${mesec}.${
            godina
        }<br> Mesto rodjenja: ${regija} <br> Pol: ${jedinstveniBroj}`;
    }

    function checkJMBG() {
        if (dan < 1 || dan > 31) {
            msg.innerHTML = "Neispravan dan rodjenja";
        } else if (mesec < 1 || mesec > 12) {
            msg.innerHTML = "Neispravan mesec rodjenja";
        } else if (godina < 900 || godina > 2017) {
            msg.innerHTML = "Neispravna godina rodjenja";
        } else if ((regija > 50 && regija < 70) || regija > 99) {
            msg.innerHTML = "Neispravna regija rodjenja";
        } else if (jedinstveniBroj > 999) {
            msg.innerHTML = "Neispravno unet pol!"; //nepotrebno, uvek ce tri cifre biti manje od 1000
        } else if (kontrolna !== ispravnaKontrolna) {
            msg.innerHTML = "Neispravan kontrolni broj";
        } else {
            msg.innerHTML = "Ispravan matični broj";
            setPerson();
        }
    }

    function parseJMBG() {
        
        let jmbg = jmbgHTML.value.split("");
        // console.log(jmbg);
        if (jmbg.length === 13) {
            dan = Number(jmbg[0] + jmbg[1]);
            mesec = Number(jmbg[2] + jmbg[3]);
            godina = Number(jmbg[4] + jmbg[5] + jmbg[6]);
            regija = Number(jmbg[7] + jmbg[8]);
            jedinstveniBroj = Number(jmbg[9] + jmbg[10] + jmbg[11]);
            kontrolna = Number(jmbg[12]);
            ispravnaKontrolna =
                11 -
                (7 * (Number(jmbg[0]) + Number(jmbg[6])) +
                    6 * (Number(jmbg[1]) + Number(jmbg[7])) +
                    5 * (Number(jmbg[2]) + Number(jmbg[8])) +
                    4 * (Number(jmbg[3]) + Number(jmbg[9])) +
                    3 * (Number(jmbg[4]) + Number(jmbg[10])) +
                    2 * (Number(jmbg[5]) + Number(jmbg[11]))) %
                    11;
            if (ispravnaKontrolna > 9) ispravnaKontrolna = 0;
            checkJMBG();
        } else {
            msg.innerHTML = "JMBG mora imati 13 cifara!";
        }
    }

    check.addEventListener("click", parseJMBG);
})();

/*
https://dijanal.github.io/JMBG/
*/


