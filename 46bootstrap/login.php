<?php include('header.php'); ?>

<?php include_once('header.php'); ?>

        <!-- Portfolio Section-->
        <section class="page-section portfolio mt-5" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2>Prijavljivanje</h2>

                <?=
                    // fake postavljamo korisnika
                    $_SESSION['user'] = 'kristijan';
                ?>
            </div>
        </section>

<?php include_once('footer.php'); ?>