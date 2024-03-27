<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PROFILE</title>
    <?php
            include_once("./include/header.php");
            include_once("../include/connect_db.php");

            $ad = $_SESSION['admin'];

            // 
            $query = "SELECT * FROM admin WHERE email='$ad'";

            $res = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($res))
            {
                $email = $row['email'];
                $profiles = $row['profile'];
            }
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
                            <h4><?php echo $email; ?> PROFILE</h4>
                            <?php
                                if (isset($_POST['update_P_btn']))
                                {
                                    $profile = $_FILES['update_P']['name'];

                                    if (empty($profile))
                                    {

                                    }
                                    else
                                    {
                                        $query = "UPDATE admin SET profile='$profile' WHERE email='$ad'";

                                        $result = mysqli_query($conn, $query);

                                        if ($result)
                                        {
                                            move_uploaded_file($_FILES['update_P']['tmp_name'], "../images/admin/$profile");
                                        }
                                    }
                                }

                            ?>
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                                    echo "<img src='../images/admin/$profiles' class='col-md-12 img-thumbnail' style='height: 400px; border-radius: 100%;'>";
                                ?>
                                 
                                <div class="form-group">
                                    <label for="update_P">UPDATE PROFILE</label>
                                    <input type="file" name="update_P" class="form-control">
                                </div>
                                
                                <input type="submit" name="update_P_btn" value="UPDATE PROFILE PICTURE" class="btn btn-outline-success mb-5">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                        if (isset($_POST['ch_last_name_btn']))
                                        {
                                            $last_name = $_POST['ch_last_name'];

                                            if (empty($last_name))
                                            {

                                            }
                                            
                                            else
                                            {
                                                $query = "UPDATE admin SET last_name='$last_name' WHERE email='$ad'";

                                                $res = mysqli_query($conn, $query);

                                                if ($res)
                                                {
                                                    $_SESSION['admin'] = $email;
                                                    echo "<script> alert('ADMIN Last Name Change Successful!'); window.location='profile.php'</script>";
                                                }
                                                else
                                                {
                                                    echo "<script> alert('ADMIN Last Name Change Failed!'); window.location='profile.php'</script>";
                                                }
                                            }
                                        }

                                    ?>
                                    <form method="POST">
                                        <h3 class="text-start">CHANGE LAST NAME</h3>
                                        <div class="form-group">
                                            <label for="ch_last_name">LAST NAME</label>
                                            <input type="text" name="ch_last_name" class="form-control" autocomplete="off">
                                        </div>

                                        <input type="submit" name="ch_last_name_btn" class="btn btn-outline-success" value="UPDATE LAST NAME">
                                    </form>

                                </div>

                                <div class="col-md-6">
                                    <?php
                                        if (isset($_POST['ch_first_name_btn']))
                                        {
                                            $first_name = $_POST['ch_first_name'];

                                            if (empty($first_name))
                                            {

                                            }
                                            
                                            else
                                            {
                                                $query = "UPDATE admin SET first_name='$first_name' WHERE email='$ad'";

                                                $res = mysqli_query($conn, $query);

                                                if ($res)
                                                {
                                                    $_SESSION['admin'] = $email;
                                                    echo "<script> alert('ADMIN First Name Change Successful!'); window.location='profile.php'</script>";
                                                }
                                                else
                                                {
                                                    echo "<script> alert('ADMIN First Name Change Failed!'); window.location='profile.php'</script>";
                                                }
                                            }
                                        }

                                    ?>
                                    <form method="POST">
                                        <h3 class="text-end">CHANGE FIRST NAME</h3>
                                        <div class="form-group">
                                            <label for="ch_first_name">FIRST NAME</label>
                                            <input type="text" name="ch_first_name" class="form-control" autocomplete="off">
                                        </div>

                                        <input type="submit" name="ch_first_name_btn" class="btn btn-outline-success" value="UPDATE FIRST NAME">
                                    </form>

                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    if (isset($_POST['ch_email_btn']))
                                    {
                                        $email = $_POST['ch_email'];

                                        if (empty($email))
                                        {

                                        }
                                        
                                        else
                                        {
                                            $query = "UPDATE admin SET email='$email' WHERE email='$ad'";

                                            $res = mysqli_query($conn, $query);

                                            if ($res)
                                            {
                                                $_SESSION['admin'] = $email;
                                                echo "<script> alert('ADMIN Email Change Successful!'); window.location='profile.php'</script>";
                                            }
                                            else
                                            {
                                                echo "<script> alert('ADMIN Email Change Failed!'); window.location='profile.php'</script>";
                                            }
                                        }
                                    }

                                    ?>
                                    <form method="POST">
                                        <h3 class="text-center">CHANGE EMAIL</h3>
                                        <div class="form-group">
                                            <label for="ch_email">EMAIL</label>
                                            <input type="email" name="ch_email" class="form-control" autocomplete="off">
                                        </div>

                                        <input type="submit" name="ch_email_btn" class="btn btn-outline-success" value="UPDATE EMAIL">
                                    </form>
                                </div>

                                <div class="col-md-6">
                                    <?php
                                        if (isset($_POST['ch_username_btn']))
                                        {
                                            $username = $_POST['ch_username'];

                                            if (empty($username))
                                            {

                                            }
                                            
                                            else
                                            {
                                                $query = "UPDATE admin SET username='$username' WHERE email='$ad'";

                                                $res = mysqli_query($conn, $query);

                                                if ($res)
                                                {
                                                    $_SESSION['admin'] = $email;
                                                    echo "<script> alert('ADMIN User Name Change Successful!'); window.location='profile.php'</script>";
                                                }
                                                else
                                                {
                                                    echo "<script> alert('ADMIN User Name Change Failed!'); window.location='profile.php'</script>";
                                                }
                                            }
                                        }
                                    ?>

                                    <form method="POST">
                                        <h3 class="text-center">CHANGE USER NAME</h3>
                                        <div class="form-group">
                                            <label for="ch_username">USER NAME</label>
                                            <input type="text" name="ch_username" class="form-control" autocomplete="off">
                                        </div>

                                        <input type="submit" name="ch_username_btn" class="btn btn-outline-success" value="UPDATE USER NAME">
                                    </form>
                                </div>
                            </div>
               
                            

                            
                            <br>
                            

                            <?php
                                if(isset($_POST['ch_pass_btn']))
                                {
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_new_pass = $_POST['con_new_pass'];

                                    $error = array();

                                    $old = mysqli_query($conn, "SELECT * FROM admin WHERE email='$ad'");

                                    $row = mysqli_fetch_array($old);

                                    $pass = $row['password'];

                                    if (empty($old_pass))
                                    {
                                        $error['p'] = "Enter Your Old Password";
                                    }

                                    elseif (empty($new_pass))
                                    {
                                        $error['p'] = "Enter Your New Password";
                                    }

                                    elseif (empty($con_new_pass))
                                    {
                                        $error['p'] = "Confirm Your New Password";
                                    }

                                    elseif ($old_pass != $pass)
                                    {
                                        $error['p'] = "Invalid Old Password";
                                    }

                                    elseif ($new_pass != $con_new_pass)
                                    {
                                        $error['p'] = "New and Confirm Passwords DO NOT MATCH!";
                                    }

                                    if (count($error) == 0)
                                    {
                                        $query = "UPDATE admin SET password='$new_pass' WHERE email='$ad'";

                                        mysqli_query($conn, $query);

                                        echo "<script> alert('ADMIN Password Updated Successfully!'); window.location='profile.php'</script>";
                                    }        

                                    else
                                    {
                                        echo "<script> alert('ADMIN Password Update Failed!'); window.location='profile.php'</script>";
                                    }
                                }

                                if (isset($error['p']))
                                {
                                    $e = $error['p'];

                                    $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                }

                                else
                                {
                                    $show = "";
                                }

                            ?>

                            <form method="POST">
                                <h3 class="text-center my-2">CHANGE PASSWORD</h3>
                                <div class="">
                                    <?php
                                        echo $show;
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="old_pass">OLD PASSWORD</label>
                                    <input type="password" name="old_pass" class="form-control">
                                    <label for="new_pass">NEW PASSWORD</label>
                                    <input type="password" name="new_pass" class="form-control">
                                    <label for="con_new_pass">CONFIRM PASSWORD</label>
                                    <input type="password" name="con_new_pass" class="form-control">
                                </div>

                                <input type="submit" name="ch_pass_btn" class="btn btn-outline-success" value="UPDATE PASSWORD">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>