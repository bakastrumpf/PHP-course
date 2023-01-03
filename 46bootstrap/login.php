<?php include('header.php'); ?>

        <!-- Portfolio Section-->
        <section class="page-section portfolio mt-5" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2>Prijavljivanje</h2>

                <?=
                    // fake postavljamo korisnika
                    $_SESSION['user'] = 'UlogovaniKorisnik';
                ?>
            </div>
        </section>

<?php include('footer.php'); ?>