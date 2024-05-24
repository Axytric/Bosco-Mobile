<?php
    session_start();

    if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){
        header('Location: dashboard.php');
        exit();
    }
    
    require('config.php');
    require('database.php');

    $success = false;

    $error_message_student_id = '';
    $error_message_first_name = '';
    $error_message_last_name = '';
    $error_message_email = '';
    $error_message_password = '';
    $error_message_password_repeat = '';

    if($_POST){
        $student_id = trim($_POST['student_id']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = strtolower(trim($_POST['email']));
        $password = trim($_POST['password']);
        $password_repeat = trim($_POST['password_repeat']);

        $is_error = false;

        if($student_id == ''){
            $error_message_student_id = 'Student ID is required.';
            $is_error = true;
        }else{
            $sql = "SELECT COUNT(*) 
                        FROM users 
                        WHERE student_id = '" . $connDB->real_escape_string($student_id) . "'";
            $result = $connDB->query($sql);
            $row = $result->fetch_row();
            if ($row[0] > 0) {
                $error_message_student_id = 'Student ID already exists.';
                $is_error = true;
            }
        }

        if($first_name == ''){
            $error_message_first_name = 'First name is required.';
            $is_error = true;
        }

        if($last_name == ''){
            $error_message_last_name = 'Last name is required.';
            $is_error = true;
        }

        if($email == ''){
            $error_message_email = 'Email is required.';
            $is_error = true;
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message_email = 'Invalid email.';
            $is_error = true;
        }else{
            $sql = "SELECT COUNT(*) 
                        FROM users 
                        WHERE email = '" . $connDB->real_escape_string($email) . "'";
            $result = $connDB->query($sql);
            $row = $result->fetch_row();
            if ($row[0] > 0) {
                $error_message_email = 'Email already exists.';
                $is_error = true;
            }
        }

        if($password == ''){
            $error_message_password = 'Password is required.';
            $is_error = true;
        }else if(strlen($password) < 5){
            $error_message_password = 'Password should be at least 5 characters.';
            $is_error = true;
        }else{
            if($password_repeat == ''){
                $error_message_password_repeat = 'Password repeat is required.';
                $is_error = true;
            }else if($password != $password_repeat){
                $error_message_password_repeat = 'Password and password not repeat are not the same.';
                $is_error = true;
            }
        }

        if(!$is_error){
            $sql = "INSERT INTO users (
                        student_id  
                        , first_name 
                        , last_name 
                        , email 
                        , password 
                    )
                    VALUES (
                        '" . $connDB->real_escape_string($student_id) . "'
                        , '" . $connDB->real_escape_string($first_name) . "'
                        , '" . $connDB->real_escape_string($last_name) . "'
                        , '" . $connDB->real_escape_string($email) . "'
                        , MD5('" . $connDB->real_escape_string($password) . "')
                    )";

            if ($connDB->query($sql) === TRUE) {
                // echo "New record created successfully";
            } else {
                // echo "Error: " . $sql . "<br>" . $connDB->error;
            }

            $connDB->close();

            $success = true;
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
        <title>Registration</title>
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
                            <h1 class="fw-bolder">PETA3</h1>
                            <p class="lead fw-normal text-muted mb-0">Fill up the form for registration</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form method="POST" action="registration.php">

                                    <?php if($success): ?>
                                        <div class="alert alert-success" role="alert">
                                            Registration success! Thank you!
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="student_id" name="student_id" type="text" placeholder="Enter your Student ID..." />
                                        <label for="student_id">Student ID</label>
                                        <div class="invalid-feedback"><?php echo $error_message_student_id; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="first_name" name="first_name" type="text" placeholder="Enter your first name..." />
                                                <label for="first_name">First Name</label>
                                                <div class="invalid-feedback"><?php echo $error_message_first_name; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Enter your last name..." />
                                                <label for="name">Last name</label>
                                                <div class="invalid-feedback"><?php echo $error_message_last_name; ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..." value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                                        <label for="email">Email address</label>
                                        <div class="invalid-feedback"><?php echo $error_message_email; ?></div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" />
                                        <label for="password">Password</label>
                                        <div class="invalid-feedback"><?php echo $error_message_password; ?></div>
                                    </div>
                                   
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password_repeat" name="password_repeat" type="password" placeholder="Re-enter your password" />
                                        <label for="password">Repeat Password</label>
                                        <div class="invalid-feedback"><?php echo $error_message_password_repeat; ?></div>
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
