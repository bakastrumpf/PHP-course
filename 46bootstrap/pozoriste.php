<?php 
include_once('header.php'); 
$id =$_GET['id'];   // dohvatamo id pozorišta
$naziv_pozorista = $pozorista[$id];     // dohvatamo naziv pozorišta

// filtriramo samo predstave pozorišta sa datim ID
$predstave_pozorista = array_filter($predstave, function($elem) use ($id ) {
    // vrati samo elemente kod kojih je id_pozorišta jednaka zadatom ID
    // pošto ova funkcija ne vidi ID koji se pribavlja kroz GET
    // mora joj se eksplicitno zadati da koristi ID kroz USE($id)
    return $elem['id_pozorista'] == $id;
});
// var_dump($predstave_pozorista);
// exit();
?>

<!-- Portfolio Section-->
<section class="page-section portfolio mt-5" id="portfolio">
    <div class="container">
        <h2><?= $naziv_pozorista ?></h2> <br>
        
        <?php
            foreach($predstave_pozorista as $p) : ?>
            <b><?= $p['naziv'] ?> </b> <br><br>
            <i><?= $p['zanr'] ?> </i> <br><br>
            <?php endforeach; ?>
    </div>
</section>

<?php include_once('footer.php'); ?>