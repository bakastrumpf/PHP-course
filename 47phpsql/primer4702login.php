<?php
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];
$user_type = $_POST['user_type'];

$msg = "";
if (empty($user))
    $msg .= "Korisnicko ime nije uneto. <br/>";
if (empty($pass))
    $msg .= "Lozinka nije uneta. <br/>";
if (empty($user_type))
    $msg .= "Tip korisnika nije odabran. <br/>";

if ($msg != "") {
    $_SESSION['msg'] = $msg;
    header("Location:primer4701index.php");
    exit();
}

echo "Proba";

$conn = mysqli_connect("localhost", "USERNAME", "PASSWORD", "akcije2023")
    or die("Greska: " . mysqli_connect_error());
echo "Proba2";
if ($user_type == 1) {
    $sql = "select * from korisnik where userkor = '$user'";
} else {
    $sql = "select * from kompanija where userkomp = '$user'";
}

$result = mysqli_query($conn, $sql)
    or die("Greska: " . mysqli_error($conn));

echo "Proba 3";
if (mysqli_num_rows($result) > 0) {
    // pronadjen user sa zadatim korisničkim imenom
    echo "Zdravo";
    $user_db = mysqli_fetch_assoc($result);
    // var_dump($user_db)
    if ($user_db['pass'] == $pass) {
        $_SESSION['user'] = $user;
        $_SESSION['user_type'] = $user_type;
        if ($user_type == 1) {
            header("Location:primer4703korisnik.php");
            exit();
        } else {
            header("Location:primer4704komp.php");
            exit();
        }
    } else {
        $_SESSION['user'] = $user;
        $_SESSION['msg'] = "Pogresna lozinka.";
        header("Location:primer4701index.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "Pogresno korisnicko ime";
    header("Location:primer4701index.php");
    exit();
}
