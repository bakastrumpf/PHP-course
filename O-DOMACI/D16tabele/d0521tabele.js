function generisiTabelu() {
  let brKolona = document.getElementById("kolone").value;
  let brRedova = document.getElementById("redovi").value;

  const tbl = document.createElement("table");
  const tblBody = document.createElement("tbody");

  // napravi sve ćelije
  for (let i = 0; i < brRedova; i++) {
    // napravi red
    const red = document.createElement("tr");
    for (let j = 0; j < brKolona; j++) {
      // napravi <td>          
      const polje = document.createElement("td");
      // napravi tekst za <td>
      let tekst = (i + 1) + "," + (j + 1);
      const cellText = document.createTextNode(tekst);
      // const cellText = document.createTextNode(` ${i+1},  ${j+1}`);
      // dodaj <td> na kraj reda
      polje.appendChild(cellText);
      red.appendChild(polje);
    }
    // dodaj red na kraj tabele
    tblBody.appendChild(red);
  }
  // dodaj <tbody> tabeli <table>
  tbl.appendChild(tblBody);
  // dodaj tabelu <table> u telo <body>
  document.body.appendChild(tbl);
  // postavi borduru tbl na '1'
  // tbl.setAttribute("border", "1");
}

// izvor: 
// https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model/Traversing_an_HTML_table_with_JavaScript_and_DOM_Interfaces

// ideja: brisanje prethodne tabele
// naći na času s igrom pamćenja (Kristijan)
// automatsko brisanje tabele klikom na generisanje nove
// ili dugme koje briše prethodnu tabelu, ali nema veze s generisanjem nove tabele
// radi na onclick
// pominjali na igri Moj broj, nismo napisali funkciju 