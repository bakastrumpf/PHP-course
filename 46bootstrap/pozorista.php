<?php include_once('header.php'); ?>

<!-- Portfolio Section-->
<section class="page-section portfolio mt-5" id="portfolio">
    <div class="container">
        <h2>Pozorišta</h2>

        <div class="row">
            <?php
            foreach ($pozorista as $key => $value) : ?>
                <div class="col-lg-2 col-6 text-center p-3">
                    <a href="pozoriste.php?id=<?= $key ?>">
                        <img src="assets/img/pozorista/<?= $key ?>.png" style="width:60%" />
                        <br>
                        <b><?= $value ?></b>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include_once('footer.php'); ?>