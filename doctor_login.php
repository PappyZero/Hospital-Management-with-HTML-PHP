<?php
    session_start();
    
    include_once("./include/connect_db.php");

    if (isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $error = array();

        $q = "SELECT * FROM doctors WHERE email='$email' AND password='$password'";
        $qq = mysqli_query($conn, $q);

        $row = mysqli_fetch_array($qq);

        if (empty($email))
        {
            $error['login'] = "Enter Your Account Email";
        }
        elseif (empty($password))
        {
            $error['login'] = "Enter Your Password";
        }
        elseif ($row['status'] == "Pending")
        {
            $error['login'] = "Please wait for the admin to confirm your application";
        }
        elseif ($row['status'] == "Rejected")
        {
            $error['login'] = "Sorry, Try Again Later";
        }

        if (count($error) == 0)
        {
            $query = "SELECT * FROM doctors WHERE email='$email' AND password='$password'";

            $res = mysqli_query($conn, $query);

            if (mysqli_num_rows($res))
            {
                echo "<script> alert('Login Successful !'); window.location='doctor_login.php'</script>";
                
                $_SESSION['doctor'] = $email;
                // header("refresh:2;url=doctor_login.php");
            }
            else
            {
                echo "<script> alert('Login Failed! Invalid Login Details.'); window.location='doctor_login.php'</script>";
            }
        }
    }

    if (isset($error['login']))
    {
        $l = $error['login'];

        $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
    }
    else
    {
        $show = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/doctor_login.css">
    <title>DOCTOR LOGIN</title>
    <?php
        include_once("./header.php");
    ?>
</head>
<body>
    <div class="container doctor_container">
        <div class="signin">
            <h1>DOCTOR LOGIN</h1>
            <div>
                <?php echo $show; ?>
            </div>
            <form method="post">
                <div class="col">
                    <!-- <label for="email" class="form-label">EMAIL</label> -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                </div>
                <div class="col">
                    <!-- <label for="password" class="form-label">PASSWORD</label> -->
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                <!-- <button type="submit" class="btn btn-primary">LOGIN</button> -->
                <input type="submit" value="LOGIN" name="login" />

                <small>Don't have an account? <a href="apply.php">Apply Now!</a></small>
            </form>    
        </div>
    </div>
    
</body>
</html>