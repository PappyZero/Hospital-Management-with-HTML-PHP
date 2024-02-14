<?php
    session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT DOCTOR</title>
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
                    include_once("./side_nav.php");
                ?>
            </div>

            <div class="col-md-10 content">
                <h2 class="text-center ">EDIT DOCTOR</h2>
                <?php
                    if (isset($_GET['id']))
                    {
                        $id = $_GET['id'];

                        $query = "SELECT * FROM doctors WHERE doctor_id='$id'";

                        $res = mysqli_query($conn, $query);      

                        $row = mysqli_fetch_array($res);
                    }
                ?>
                <div class="row">
                    <div class="col-md-8">
                        <h5>ID : <?php echo $row['doctor_id']; ?></h5>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-center">UPDATE SALARY</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>