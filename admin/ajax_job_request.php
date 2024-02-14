<?php
    include_once("../include/connect_db.php");

    $query = "SELECT * FROM doctors WHERE status='Pending' ORDER BY date_reg ASC";

    $res = mysqli_query($conn, $query);

    $output = "";

    $output .= 
    "
        <table class='table table-bordered'>
            <tr>
                <th>ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>USER NAME</th>
                <th>EMAIL</th>
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
                    <div class='col-md-12'>
                        <div class='row'>
                            <div class='col-md-6'>
                                <button class='btn btn-outline-success approve' id='".$row['doctor_id']."'>APPROVE</button>
                            </div>
                            <div class='col-md-6'>
                                <button class='btn btn-outline-danger reject' id='".$row['doctor_id']."'>REJECT</button>
                            </div>
                        </div>
                    </div>
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