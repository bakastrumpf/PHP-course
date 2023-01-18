<?php
$conn = mysqli_connect("localhost", "USERNAME", "PASSWORD", "DB")
or die("Greska: " . mysqli_connect_error());

$sql = "select * from akcije where userkomp = '{$_SESSION['user']}'";

$akcije = mysqli_query($conn, $sql)
or die("GRESKA: " .mysqli_error($conn));

?>