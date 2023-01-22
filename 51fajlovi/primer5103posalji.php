Hello.

<?php

echo "Proba";

session_start();

echo "Proba2"; 
include_once('primer5102config.inc.php');    // objekat $conn

echo "Proba3";

$poruka = "";
$naslov = $_POST['naslov'];
$sadrzaj = $_POST['sadrzaj'];
$prioritet = $_POST['prioritet'];
$veblink = $_POST['link'];
$uspesno = true;    // fleg koji govori o uspehu procesa (upload)

// rad sa fajlovima
$ime = basename($_FILES['mojfajl']['name']);
$ekstenzija = $_FILES['mojfajl']['type'];   // kod slike: image/jpeg
$temp = $_FILES['mojfajl']['tmp_name'];
$velicina = $_FILES['mojfajl']['size'];     // u bajtima

// provera da li je fajl ispravne ekstenzije / tipa
$tipovi = array('image/jpeg', 'image/png', 'image/gif');    //'application.pdf'
if(!in_array($ekstenzija, $tipovi)){
    $poruka .= " Nepodržan tip fajla.";
    $uspesno = false;
}

// provera dimenzija slike
define("MAX_SIRINA", 800);     // 800px
define("MAX_VISINA", 640);     // 680px
define("MAX_SIZE", 5000000);   // 5MB

list($sirina, $visina, $ekst) = getimagesize($temp);
$velicina2 = filesize($temp);   // vraca u bajtima

echo "Širina: $sirina <br> Visina: $visina <br>";
echo "Veličina".($velicina/1000). " kb";

if($sirina > MAX_SIRINA || $visina > MAX_VISINA){
    $poruka .= " Dimenzije slike nisu ispravne.";
    $uspesno = false;
}

if($velicina > MAX_SIZE){
    $poruka .= " Preveliki fajl! Max = 5MB";
    $uspesno = false;
}

if($veblink == "" || $veblink == "http://"){
    $poruka .= " Neispravan link.";
    $uspesno = false;
} else {
    $veblink = $conn -> real_escape_string($_POST['veblink']);
}

$cilj = "vest_slike/" .$ime;
if($uspesno && isset($_POST['potvrdi'])){
    // provera uspešnosti prebacivanja na serveru
    if(move_uploaded_file($temp, $cilj)){
        $vreme = date("Y-m-d H:i:s", time());
        $upit = "INSERT INTO VEST(naslov, sadrzaj, veblink, prioritet, putanja, trenutak) 
            VALUES('$naslov', '$sadrzaj', '$veblink', $prioritet, '$cilj', '$vreme')";

        $rezultat = $conn->query($upit);
        if($rezultat){
            $poruka .= " Fajl $ime uspešno poslat na server. | ";
            echo $poruka;
        } else {
            $poruka .= " Desila se greška prilikom slanja fajla $ime. Pokušajte ponovo. | ";
            echo $poruka;
        }
    }
    echo "<a href='primer5101index.php'> Vrati se na početnu stranu.</a>";
} else {
    $_SESSION['poruka'] = "Neuspešno slanje fajla! " .$poruka;
    header("Location:primer5101index.php");
}


?>