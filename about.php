<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>About Us</title>
        <link href="css/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <?php require('menu.php'); ?>

            <!-- Header-->
            <header class="py-5">
                <div class="container px-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-6">
                            <div class="text-center my-5">
                                <h1 class="fw-bolder mb-3">Our mission is to make phones accesible for Bosconians.</h1>
                                <p class="lead fw-normal text-muted mb-4">At Bosco Mobile, our mission is to ensure that every Bosconian can afford a reliable phone. Through our dedication to refurbishing high-quality devices, we make cutting-edge technology accessible to all. With affordable prices and a commitment to customer satisfaction, we empower Bosconians to stay connected and thrive in today's digital world. Join us in bridging the gap and making communication inclusive for everyone.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
     
            <!-- Team members section-->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="fw-bolder">About Us</h2>
                        <p class="lead fw-normal text-muted mb-5">Bosco Mobile Crew</p>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <h5 class="fw-bolder"> Magdato, Lorenzo </h5>
                                <div class="fst-italic text-muted"> Leader and CEO</div>
                                <br>
                                <br>
                                <h5 class="fw-bolder"> Bhojwani, Yash </h5>
                                <div class="fst-italic text-muted"> Lead Developer </div>
                                <br>
                                <br>
                                <h5 class="fw-bolder"> Olivar, Miguel </h5>
                                <div class="fst-italic text-muted"> Front End Developer </div>
                                <br>
                                <br>
                                <h5 class="fw-bolder"> Teo, Zander </h5>
                                <div class="fst-italic text-muted"> Back End Developer </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Bosco Mobile </div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="contact.php">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
