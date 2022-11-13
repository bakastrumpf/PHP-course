function izracunaj() {
    var a = parseInt(document.racunaljka.prvi.value);
    var b = parseInt(document.racunaljka.drugi.value);
    var rez = 0;
    var operacija=document.racunaljka.operacija.value;

    if ((isNaN(a) == false) && (isNaN(b) == false)) {
        switch (operacija) {
            case "zbir": rez = a + b;
                break;
            case "razlika": rez = a - b;
                break;
            case "proizvod": rez = a * b;
                break;
            case "deljenje": if (b == 0)
                        rez = "Zabranjeno deljenje nulom!";
                    else
                        rez = a / b;
                break;
            default: rez = "Nepostojeća operacija";
        }
        document.racunaljka.rezultat.value = rez;
    } else {
        document.racunaljka.rezultat.value = "Računaljka radi samo sa celim brojevima!";
    }
}