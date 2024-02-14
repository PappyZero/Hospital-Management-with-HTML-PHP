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
            <form method="post">
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

                <small>Don't have an account? <a href="apply.php">Apply Now!</a></small>
            </form>    
        </div>
    </div>
    
</body>
</html>