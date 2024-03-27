<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCTOR</title>
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
                <h2 class="text-center my-2">TOTAL DOCTORS</h2>
                <?php
                    $query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY date_reg ASC";

                    $res = mysqli_query($conn, $query);

                    $output = "";

                    $output .= 
                    "
                        <table class='table table-bordered'>
                            <tr>
                                <th>ID</th>
                                <th>LAST NAME</th>
                                <th>FIRST NAME</th>
                                <th>EMAIL</th>
                                <th>USER NAME</th>
                                <th>CONTACT INFO</th>
                                <th>GENDER</th>
                                <th>COUNTRY</th>
                                <th>SPECIALIZATION</th>
                                <th>SALARY</th>
                                <th>DATE REGISTERED</th>            
                                <th>ACTION</th>            
                            </tr>
                    ";

                    if (mysqli_num_rows($res) < 1)
                    {
                        $output .=
                        "
                            <tr>
                                <td colspan='10' class='text-center'>No Job Requests Yet.</td>
                            </tr>
                        ";
                    }

                    while ($row = mysqli_fetch_array($res))
                    {
                        $output .= 
                        "
                            <tr>
                                <td>".$row['doctor_id']."</td>
                                <td>".$row['f_name']."</td>
                                <td>".$row['l_name']."</td>
                                <td>".$row['user_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['contact_info']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['country']."</td>
                                <td>".$row['spec']."</td>
                                <td>".$row['salary']."</td>
                                <td>".$row['date_reg']."</td> 
                                <td>
                                    <a href='./edit.php?id".$row['doctor_id']."'>
                                    <button class='btn btn-outline-info'>EDIT</button>
                                    </a>
                                </td> 

                        ";
                    }

                        $output .=
                        "
                            </tr>
                            </table>
                        ";
                    echo $output


                ?>
            </div>
        </div>
    </div>
</body>
</html>