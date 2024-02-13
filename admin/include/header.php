<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Stackpath CSS -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Online Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- Local Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="../css/bootstrap-css/bootstrap.css"> -->

    <!-- Font Awesome -->    
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"> -->

    <!-- Font Awesome -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" /> -->

    <title>HEADER</title>
</head>
<body>        
    <section class="bg-white">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand brand_logo" href="#">
                    <img src="../images/logo/7_removebg.png" alt="Logo" width="100" height="90" class="d-inline-block" >
                    <span>veri.care</span>
                </a>

                <ul class="nav d-grid gap-2 d-md-flex justify-content-md-end contact_icons">
                    <li class="nav-item">
                        <a class="nav-link active text-success" aria-current="page" href="#"><i class="fa-solid fa-map-location">  Location</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="#"><i class="fa-solid fa-envelope">  Mail</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="#"><i class="fa-solid fa-phone-volume">  Phone</i></a>
                    </li>
                </ul>
<!-- 
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-outline-success me-md-2" type="button">Sign In</button>
                    <button class="btn btn-outline-success" type="button">Get Started</button>
                </div> -->
            </div>
        </nav>
    </section>

        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
            <div class="container">
                                
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <?php
                            if (isset($_SESSION['admin']))
                            {
                                $user = $_SESSION['admin']; 
                                echo '
                                <div class="row g-3 align-items-center">

                                    <div class="col-auto">
                                        <li class="nav-item nav_tabs">
                                        <a class="nav-link" href="#">'.$user.'</a>
                                        </li>
                                    </div>

                                    <div class="col-auto">
                                        <li class="nav-item nav_tabs">
                                            <a class="nav-link" href="logout.php">LOGOUT</a>
                                        </li>
                                    </div>
                                </div>
                                ';
                            }

                            else
                            {
                                echo '
                                <li class="nav-item nav_tabs">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item nav_tabs">
                                    <a class="nav-link" href="admin_login.php">Admin</a>
                                </li>
                                <li class="nav-item nav_tabs dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Doctor</a>
                                    <ul class="dropdown-menu dropdown_menu_list">
                                        <li><a href="#" class="dropdown-item">Action 1</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Action 2</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Action 3</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item nav_tabs dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Receptionist</a>
                                    <ul class="dropdown-menu dropdown_menu_list">
                                        <li><a href="#" class="dropdown-item">Action 1</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Action 2</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Action 3</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item nav_tabs dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Patient</a>
                                    <ul class="dropdown-menu dropdown_menu_list">
                                        <li><a href="#" class="dropdown-item">Action 1</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Action 2</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="#" class="dropdown-item">Action 3</a></li>
                                    </ul>
                                </li>
                                ';
                            }
                        ?>
                    </ul>

                    
                    <div class="d-grid gap-5 d-md-flex justify-content-md-end social_icons nav_tabs ">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-solid fa-lock"></i></a>
                        <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </div>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

 

            </div>
        </nav>

    <!-- <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Active</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="#">Longer nav link</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="#">Link</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" aria-disabled="true">Disabled</a>
    </nav> -->
    
</body>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/6f1202466a.js" crossorigin="anonymous"></script>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

<!-- Google CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Online Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Local Bootstrap JS -->
<!-- <script src="../js/bootstrap-js/bootstrap.js"></script> -->
</html>