<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATORS</title>
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
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">ALL ADMINISTRATORS</h5>
                            <?php
                                $ad = $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE email ='$ad' || email !='$ad' ";
                                $res = mysqli_query($conn, $query);

                                $output = "
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>ID</th>
                                        <th>LAST NAME</th>
                                        <th>FIRST NAME</th>
                                        <th>EMAIL</th>
                                        <th>USER NAME</th>
                                        <th style='width: 10%;'>ACTIONS</th>
                                    </tr>
                                ";

                                if (mysqli_num_rows($res) < 1)
                                {
                                    $output .= "
                                    <tr>
                                        <td colspan'3' class='text-center'>
                                            No New Admin
                                        </td>
                                    </tr>";
                                }

                                while ($row = mysqli_fetch_array($res))
                                {
                                    $id = $row['admin_id'];
                                    $last_name = $row['last_name'];
                                    $first_name = $row['first_name'];
                                    $email = $row['email'];
                                    $username = $row['username'];

                                    $output .= "
                                    <tr>
                                    <td>$id</td>
                                    <td>$last_name</td>
                                    <td>$first_name</td>
                                    <td>$email</td>
                                    <td>$username</td>
                                    <td>
                                        <a href='admin.php?id=$id'>
                                            <button id='$id' class='btn btn-outline-danger remove'>Remove</button>
                                        </a>
                                    </td>
                                    ";
                                }

                                $output .= "
                                    </tr>
                                </table>
                                ";
                                echo $output;

                                if (isset($_GET['id']))
                                {
                                    $id = $_GET['id'];

                                    $query = "DELETE FROM admin WHERE admin_id='$id'";
                                    $del_res = mysqli_query($conn, $query);

                                    if ($del_res)
                                    {
                                        echo "<script> alert('ADMIN has been Deleted Successfully!'); window.location='admin.php'</script>";
                                    }
                                    else
                                    {
                                        echo "<script> alert('ADMIN Deletion Failed!'); window.location='admin.php'</script>";
                                    }
                                    
                                }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                                if (isset($_POST['add_admin']))
                                {
                                    $admin_last_name = $_POST['add_admin_last_name'];
                                    $admin_first_name = $_POST['add_admin_first_name'];                                    
                                    $admin_email = $_POST['add_admin_email'];
                                    $admin_user_name = $_POST['add_admin_user_name'];
                                    $admin_pword = $_POST['add_admin_pword'];
                                    $admin_img = $_FILES['add_admin_img']['name'];

                                    $error = array();

                                    if (empty($admin_last_name))
                                    {
                                        $error['u'] = "Enter The Admin Last Name";
                                    }

                                    elseif (empty($admin_first_name))
                                    {
                                        $error['u'] = "Enter The Admin First Name";
                                    }

                                    elseif (empty($admin_email))
                                    {
                                        $error['u'] = "Enter The Admin Email";
                                    }

                                    elseif (empty($admin_user_name))
                                    {
                                        $error['u'] = "Enter The Admin User Name";
                                    }

                                    elseif (empty($admin_pword))
                                    {
                                        $error['u'] = "Enter The Admin Password";
                                    }


                                    elseif (empty($admin_img))
                                    {
                                        $error['u'] = "Add The Admin Picture";
                                    }

                                    if (count($error) == 0)
                                    {
                                        // $hashed_password = password_hash($add_admin_pword, PASSWORD_DEFAULT);

                                        // Authentication to check if the email already exists
                                        $query = "SELECT * FROM admin WHERE email = '$add_admin_email' ";
                                        $query_check = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_check) > 0) 
                                        {
                                            echo "<script> alert('EMAIL already exists. Please choose another. !'); window.location='admin.php'</script>";
                                        }

                                        else
                                        {
                                            $q = "INSERT INTO admin(last_name, first_name, email, username, password, profile) 
                                            VALUES('$admin_last_name', '$admin_first_name', '$admin_email', '$admin_user_name', '$admin_pword', '$admin_img')";
        
                                            $result = mysqli_query($conn, $q);
        
                                            if ($result)
                                            {
                                                move_uploaded_file($_FILES['add_admin_img']['tmp_name'],"../images/admin/$admin_img");
                                                echo "<script> alert('ADMIN Added Successfully!'); window.location='admin.php'</script>";

                                            }
        
                                            else
                                            {
                                                echo "<script> alert('ADMIN Addition Failed!'); window.location='admin.php'</script>";
                                            }
                                        }
                                    }
                                }

                                if (isset($error['u']))
                                {
                                    $er = $error['u'];
                                    $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                }

                                else
                                {
                                    $show = "";
                                }

                            ?>
                            <h5 class="text-center">ADD ADMINISTRATOR</h5>
                            <form method="POST" enctype="multipart/form-data">
                                <div>
                                    <?php 
                                        echo $show;
                                        // echo "<script> alert $show; window.location='admin.php'</script>";
                                    ?>
                                </div>
                                <div class="from-group mb-3">
                                    <label for="add_admin_last_name">LAST NAME</label>
                                    <input type="text" name="add_admin_last_name" class="form-control" autocomplete="off">
                                    <br>

                                    <label for="add_admin_first_name">FIRST NAME</label>
                                    <input type="text" name="add_admin_first_name" class="form-control" autocomplete="off">
                                    <br>   
                                    
                                    <label for="add_admin_email">EMAIL</label>
                                    <input type="email" name="add_admin_email" class="form-control" autocomplete="off">
                                    <br>  
                                    
                                    <label for="add_admin_user_name">USER NAME</label>
                                    <input type="text" name="add_admin_user_name" class="form-control" autocomplete="off">
                                    <br>                               

                                    <label for="add_admin_pword">PASSWORD</label>
                                    <input type="password" name="add_admin_pword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="add_admin_img">ADD PROFILE PICTURE</label>
                                    <input type="file" name="add_admin_img" class="form-control">
                                </div>
                                <input type="submit" class="btn btn-outline-success" name="add_admin" value="ADD ADMIN">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>