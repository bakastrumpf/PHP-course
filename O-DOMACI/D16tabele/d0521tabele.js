function generisiTabelu(){
  let brKolona = document.getElementById("kolone").value;
  let brRedova = document.getElementById("redovi").value;

  const tbl = document.createElement("table");
  const tblBody = document.createElement("tbody");

  // creating all cells
  for (let i = 0; i < brRedova; i++) {
      // creates a table row
      const red = document.createElement("tr");
      for (let j = 0; j < brKolona; j++) {
          // Create a <td> element and a text node, make the text
          // node the contents of the <td>, and put the <td> at
          // the end of the table row
          const polje = document.createElement("td");
          let tekst=(i+1)+","+(j+1);
          const cellText = document.createTextNode(tekst);
          // const cellText = document.createTextNode(` ${i+1},  ${j+1}`);
          polje.appendChild(cellText);
          red.appendChild(polje);
      }
  // add the row to the end of the table body
  tblBody.appendChild(red);
  }
  // put the <tbody> in the <table>
  tbl.appendChild(tblBody);
  // appends <table> into <body>
  document.body.appendChild(tbl);
  // sets the border attribute of tbl to '2'
  // tbl.setAttribute("border", "1");
}
// source: https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model/Traversing_an_HTML_table_with_JavaScript_and_DOM_Interfaces