
<?php
    session_start();

    if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){
        header('Location: dashboard.php');
        exit();
    }

    require('config.php');
    require('database.php');

    $error_message_email = '';
    $error_message_password = '';

    if($_POST){
        $email = strtolower(trim($_POST['email']));
        $password = trim($_POST['password']);

        $is_error = false;

        if($email == ''){
            $error_message_email = 'Email is required.';
            $is_error = true;
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message_email = 'Invalid email.';
            $is_error = true;
        }else{
            $sql = "SELECT *
                        FROM users 
                        WHERE email = '" . $connDB->real_escape_string($email) . "'";
            $result = $connDB->query($sql);
            $row = $result->fetch_array();
            if (empty($row)) {
                $error_message_email = 'Email does not exists.';
                $is_error = true;
            }else{
                if($password == ''){
                    $error_message_password = 'Password is required.';
                    $is_error = true;
                }else if($row['password']!=md5($password)){
                    $error_message_password = 'Invalid password';
                    $is_error = true;
                }
            }
        }

        

        if(!$is_error){
            $connDB->close();

            $_SESSION['is_logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['student_id'] = $row['student_id'];

            header('Location: dashboard.php');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <?php require('menu.php'); ?>

            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <h1 class="fw-bolder">Login</h1>
                            <p class="lead fw-normal text-muted mb-0">Welcome back</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            <form method="POST" action="login.php">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..." value="" />
                                        <label for="email">Email address</label>
                                        <div class="invalid-feedback"><?php echo $error_message_email; ?></div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" />
                                        <label for="password">Password</label>
                                        <div class="invalid-feedback"><?php echo $error_message_password; ?></div>
                                    </div>
                                    
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                                </form>
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
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

