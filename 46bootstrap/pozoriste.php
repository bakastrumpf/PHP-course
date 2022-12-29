<?php 
include_once('header.php'); 
$id =$_GET['id'];
$naziv_pozorista = $pozorista[$id];

$predstave_pozorista = array_filter($predstave, function($elem) use ($id) {
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