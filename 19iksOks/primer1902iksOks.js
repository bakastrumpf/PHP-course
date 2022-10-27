// console.log("Hello, world");

let boxes = [0, 0, 0, 0, 0, 0, 0, 0, 0];
let turn = 0;
// let gameOver = false;  
// --> ako ovo koristimo, u kombinciji s linijama 13-15, kod ne radi
// tj. klik na polje ne radi ništa i prijavljuje grešku upravo s promenljivom gameOver
// koja se koristi pre nego što je definisana

function boxClicked(box) {

    // console.log(box);
  //  if(gameOver) {
  //      return;
  //  }

    if(boxes[box] != 0 ) {
        alert("Kliknite na slobodno polje!");
        return;
    }

    const id = "box" + box;
    const element = document.getElementById(id);

    if (turn == 0) {
        element.innerHTML = "<img src= \"slike/X.png\" width=\"40\" >";
    } else {
        element.innerHTML = "<img src= \"slike/O.png\" width=\"40\" >";
    }

    if (turn == 0) {
        boxes[box] = 1;
        turn = 1;
    } else {
        boxes[box] = 2;
        turn = 0;
    }

    let row0 = boxes[0] == boxes[1] && boxes[0] == boxes[2] && boxes[0] != 0;
    let row1 = boxes[3] == boxes[4] && boxes[3] == boxes[5] && boxes[3] != 0;
    let row2 = boxes[6] == boxes[7] && boxes[6] == boxes[8] && boxes[6] != 0;

    let col0 = boxes[0] == boxes[3] && boxes[0] == boxes[6] && boxes[0] != 0;
    let col1 = boxes[1] == boxes[4] && boxes[1] == boxes[7] && boxes[1] != 0;
    let col2 = boxes[2] == boxes[5] && boxes[2] == boxes[8] && boxes[2] != 0;

    let d0 = boxes[0] == boxes[4] && boxes[0] == boxes[8] && boxes[0] != 0;
    let d1 = boxes[6] == boxes[4] && boxes[6] == boxes[2] && boxes[6] != 0;

    let gameOver = row0 || row1 || row2 || col0 || col1 || col2 || d0 || d1;

    if (gameOver) {
        if (row0) {
            document.getElementById("box0").style.backgroundColor = "green";
            document.getElementById("box1").style.backgroundColor = "green";
            document.getElementById("box2").style.backgroundColor = "green";
        }
        let message = "Igra je završena! " + (turn == 1 ? "Pobednik je IKS!" : "Pobednik je OKS!");
        setTimeout(() => alert(message), 100);
    }
}