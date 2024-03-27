<?php

    session_start();
    
    include_once("./include/connect_db.php");
    
    if (isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $error = array();

        if (empty($email))
        {
            $error['admin'] = "Enter your Email";
        }

        elseif(empty($password))
        {
            $error['admin'] = "Enter your password";
        }

        if (count($error) == 0)
        {
            $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1)
            {
                echo "<script>alert('Admin Login Successful!')</script>";
                $_SESSION['admin'] = $email;

                header("refresh:1;url=admin/index.php");
                exit();
            }

            else
            {
                echo "<script>alert('Invalid Email or Password!')</script>";
                // header("refresh:1;url=admin_login.php");
                // exit();

            }
        }
    }


    // if (isset($_POST['submit_login'])) 
    // {
    //     $login = $_POST['login']; // This will hold either the email or username
    //     $password = $_POST['password'];
    
    //     $error = array();
    
    //     if (empty($login)) {
    //         $error['admin'] = "Enter your Email or Username";
    //     } elseif (empty($password)) {
    //         $error['admin'] = "Enter your password";
    //     }
    
    //     if (count($error) == 0) {
    //         // Check if login is an email or username
    //         $query = "SELECT * FROM admin WHERE (email='$login' OR username='$login') AND password='$password'";
            
    //         $result = mysqli_query($conn, $query);
    
    //         if (mysqli_num_rows($result) == 1) {
    //             echo "<script>alert('Admin Login Successful!')</script>";
    //             $_SESSION['admin'] = $login;
    
    //             header("refresh:1;url=admin/index.php");
    //             exit();
    //         } else {
    //             echo "<script>alert('Invalid Email or Password!')</script>";
    //         }
    //     }
    // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/admin_login.css">

    <title>ADMIN LOGIN</title>


    <?php
        include_once("./header.php");
    ?>
</head>
<body>
    <div class="container admin_container">
        <div class="signin">
            <h1>ADMIN LOGIN</h1>
            <form method="post">
                    <?php
                        if (isset($error['admin']))
                        {
                            $sh = $error['admin'];

                            $show = "<h5 class='text-center alert alert-danger'>$sh</h5>";
                        }

                        else
                        {
                            $show = "";
                        }
                        echo $show;
                    ?>
                <div class="col">
                    <!-- <label for="email" class="form-label">EMAIL</label> -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="emailexample@gmail.com">
                </div>
                <div class="col">
                    <!-- <label for="password" class="form-label">PASSWORD</label> -->
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                <!-- <button type="submit" class="btn btn-primary">LOGIN</button> -->
                <input type="submit" value="LOGIN" name="login" />

            </form>    
        </div>
    </div>

</body>
</html>


