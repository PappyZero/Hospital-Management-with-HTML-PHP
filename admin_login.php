<?php
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

                header("Location:admin/index.php");
                exit();
             }

            else
            {
                echo "<script>alert('Invalid Email or Password!')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

    <!-- Brand Icon -->
    <!-- <link rel="shortcut icon" href="./image/wms_logo.jpeg" type="image/x-icon" /> -->

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/admin_login.css">

    <title>ADMIN LOGIN</title>
    <style>
        .error-message {
            text-align: center;
            margin-top: 20px;
        }

        .alert-danger {
            background-color: #ffcccb;
            color: #ff0000;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #caffbf;
            color: #000;
            padding: 10px;
            border-radius: 5px;
        }
    </style>

    <?php
        include_once("./include/header.php");
    ?>
</head>
<body>
    <div class="container admin_container">
        <div class="signin">
            <h1>ADMIN LOGIN</h1>
            <form method="post">
                <div class="alert alert-danger">
                    <?php
                        if (isset($error['admin']))
                        {
                            $show = $error['admin'];
                        }

                        else
                        {
                            $show = "";
                        }
                        echo $show;
                    ?>
                </div>
                <div class="col">
                    <!-- <label for="email" class="form-label">EMAIL</label> -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
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

           

    <!-- <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div> 
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div> -->

    <!-- <div class="container admin_container align-items-center">
        <div class="signin">
            <h1>ADMIN LOGIN</h1>
            <div class="error-message">
                <?php
                    if (!empty($error_message_1)) {
                        echo "<div class='alert alert-danger'>$error_message_1</div>";
                    }
                    if (!empty($error_message_2)) {
                        echo "<div class='alert alert-danger'>$error_message_2</div>";
                    }
                    if (!empty($success_message)) {
                        echo "<div class='alert alert-success'>$success_message</div>";
                    }
                ?>
            </div> -->

            <!-- <?php 
                // if(isset($_SESSION['status']))
                // {
                //     ?>
                //     <div class="alert alert-success">
                //         <h5><?= $_SESSION['status']; ?></h5>
                //     </div>
                //     <?php
                //     unset($_SESSION['status']);
                // }
            ?> -->

            <!-- <form action="./admin_login_connect.php" method="post">
                <input type="email" placeholder="EMAIL" class="form-control" id="login_email" name="login_email" required />
                <input type="password" placeholder="PASSWORD" class="form-control" id="login_password" name="login_password" required />
                <br>
                <a href="#">Forgot password? </a>
                <input type="submit" value="LOGIN" name="login" />
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </form>
        </div>
    </div> -->

</body>
</html>


