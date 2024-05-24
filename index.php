<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Home</title>
        <link href="css/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <?php require('menu.php'); ?>

            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Bosco Mobile</h1>
                                <p class="lead fw-normal text-white-50 mb-4">
Welcome to Bosco Mobile, your premier destination for high-quality refurbished phones! At Bosco Mobile, we believe in providing exceptional value without compromising on quality. Our extensive selection of refurbished smartphones includes top brands and the latest models, all meticulously tested and certified to meet our rigorous standards.</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="registration.php">Order</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="img/logo.png" alt="..." /></div>
                    </div>
                </div>
            </header>
        
            
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Our Latest Models</h2>
                                <p class="lead fw-normal text-muted mb-5">Stay current with Bosco Mobile, where the latest models meet exceptional value. Explore our collection today and elevate your mobile experience with the best in refurbished smartphones!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="img/iphone.png" alt="..." />
                                <div class="card-body p-4">
                                    <a class="text-decoration-none link-dark stretched-link" href="img/iphone.png"><h5 class="card-title mb-3">iPhone 15</h5></a>
                                    <p class="card-text mb-0">Experience the cutting-edge technology of the iPhone 15 with our meticulously refurbished models. Enjoy the latest features and performance at a fraction of the cost of a new device. Choose Bosco Mobile for quality you can trust and significant savings on the iPhone 15.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="img/samsung.jpg" alt="..." />
                                <div class="card-body p-4">
                                    <a class="text-decoration-none link-dark stretched-link" href="img/samsung.jpg"><h5 class="card-title mb-3">Samsung S24</h5></a>
                                    <p class="card-text mb-0">Discover the pinnacle of Samsung's technological prowess with our refurbished Samsung S24. Elevate your mobile experience with its cutting-edge features and sleek design, all at a fraction of the original cost. Trust Bosco Mobile for quality assurance and unbeatable value on the Samsung S24.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="img/nokia.png" alt="..." />
                                <div class="card-body p-4">
                                    <a class="text-decoration-none link-dark stretched-link" href="img/nokia.png"><h5 class="card-title mb-3">Nokia</h5></a>
                                    <p class="card-text mb-0">Experience the timeless reliability of Nokia with our refurbished Nokia smartphones. From classic durability to modern innovation, our Nokia lineup offers exceptional performance at an affordable price. Trust Bosco Mobile for quality assurance and unbeatable value on refurbished Nokia devices.</p>
                                </div>
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
