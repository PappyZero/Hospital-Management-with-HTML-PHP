<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS File -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Stackpath CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->

    <!-- Online Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>ADMIN DASHBOARD</title>
    <?php
        include_once("./include/header.php");
        include_once("../include/connect_db.php");
    ?>
</head>
<body>  
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <?php
                        include_once("./side_nav.php")
                    ?>
                </div>
                <div class="col-md-10 content">
                    <div class="container">
                        <h4>ADMIN DASHBOARD</h4>
                        <div class="row justify-content-evenly admin_box">
                            <div class="col mx-2 bg-success">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 align-items-center">
                                            <?php
                                                $ad = mysqli_query($conn, "SELECT * FROM admin");
                                                $num = mysqli_num_rows($ad);
                                            ?>
                                            <h5 class="my-3 text-white"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4 my-4 admin_dash_icons">
                                            <a href="./admin.php"><i class="fa-solid fa-user-tie"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mx-2 bg-info">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 align-items-center">
                                            <?php
                                                $doctor = mysqli_query($conn, "SELECT * FROM doctors WHERE status='Approved'");

                                                $num2 = mysqli_num_rows($doctor);
                                            ?>
                                            <h5 class="my-3 text-white"><?php echo $num2; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4 my-4 admin_dash_icons">
                                            <a href="./doctor.php"><i class="fa-solid fa-user-doctor"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mx-2 bg-warning">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 align-items-center">
                                            <h5 class="my-3 text-white">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-4 my-4 admin_dash_icons">
                                            <a href="#"><i class="fa-solid fa-bed-pulse"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-evenly admin_box mt-3">
                            <div class="col mx-2 bg-danger">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 align-items-center">
                                            <h5 class="my-3 text-white">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Reports</h5>
                                        </div>
                                        <div class="col-md-4 my-4 admin_dash_icons">
                                            <a href="#"><i class="fa-solid fa-flag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mx-2 bg-warning">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 align-items-center">
                                            <?php
                                                $job = mysqli_query($conn, "SELECT * FROM doctors WHERE status='Pending'");

                                                $num1 = mysqli_num_rows($job);

                                            ?>
                                            <h5 class="my-3 text-white"><?php echo $num1; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Job Requests</h5>
                                        </div>
                                        <div class="col-md-4 my-4 admin_dash_icons">
                                            <a href="./job_request.php"><i class="fa-solid fa-book-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mx-2 bg-success">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 align-items-center">
                                            <h5 class="my-3 text-white">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-4 my-4 admin_dash_icons">
                                            <a href="#"><i class="fa-solid fa-money-bill-1-wave"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
       
    </div>
    
</body>

</html>