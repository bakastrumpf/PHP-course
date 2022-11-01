function dodajPitanja(){
    const textarea = document.getElementById("pitanja");
    const text = textarea.value;

    console.log(text);

    const pitanja = text.split ("(Q)").slice(1);
    console.log(pitanja);

}