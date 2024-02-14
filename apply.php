<?php
    // session_start();
    include_once("./include/connect_db.php");

    if (isset($_POST['apply']))
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];
        $num = $_POST['num'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $spec = $_POST['spec'];
        // $image = $_FILES['image']['name'];

        $error = array();

        if (empty($firstName))
        {
            $error['apply'] = "Enter Your First Name";
        }
        elseif (empty($lastName))
        {
            $error['apply'] = "Enter Your Last Name";
        }
        elseif (empty($userName))
        {
            $error['apply'] = "Enter Your User Name";
        }
        elseif (empty($email))
        {
            $error['apply'] = "Enter Your Email";
        }
        elseif (empty($password))
        {
            $error['apply'] = "Enter Your Password";
        }
        elseif (empty($con_password))
        {
            $error['apply'] = "Confirm Your Password";
        }
        elseif (empty($num))
        {
            $error['apply'] = "Enter Your Phone Number";
        }
        elseif (empty($gender))
        {
            $error['apply'] = "Select Your Gender";
        }
        elseif (empty($country))
        {
            $error['apply'] = "Select Your Country";
        }
        elseif (empty($spec))
        {
            $error['apply'] = "Select Your Specialization";
        }
        // elseif (empty($image))
        // {
        //     $error['apply'] = "Add The Profile Picture";
        // }

        elseif ($password != $con_password)
        {
            $error['apply'] = "Password Do Not MATCH!";
        }

        if (count($error) == 0)
        {
            // Authentication to check if the email already exists
            $qry = "SELECT * FROM doctors WHERE email ='$email' OR contact_info='$num' ";
            $query_check = mysqli_query($conn, $qry);

            if (mysqli_num_rows($query_check) > 0)
            {
                echo "<script> alert('EMAIL or PHONE NUMBER already exists. Please choose another. !'); window.location='apply.php'</script>";
            }

            else
            {
                $query = "INSERT INTO doctors(f_name, l_name, user_name, email, password, contact_info, 
                gender, country, spec, salary, date_reg, status, profile) VALUES('$firstName',
                '$lastName', '$userName', '$email', '$password', '$num', '$gender', '$country', '$spec',
                '0', NOW(), 'Pending', 'image.jpg')";

                $result = mysqli_query($conn, $query);

                if ($result)
                {
                    // move_uploaded_file($_FILES['image']['tmp_name'],"../images/doctor_apply/$image");
                    echo "<script> alert('You Have Applied Successfully!'); window.location='apply.php'</script>";
                    header("refresh:2;url=doctor_login.php");
                }
                else
                {
                    echo "<script> alert('Application Failed!'); window.location='apply.php'</script>";

                }
            }
        }

    }

    if (isset($error['apply']))
    {
        $s = $error['apply'];

        $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
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
    <link rel="stylesheet" href="./css/apply.css">
    <title>APPLY NOW</title>
    <?php
        include_once("./header.php");
    ?>
</head>
<body>
    <!-- Register Form starts here. -->
    <div class="container apply_container">
        <div class="signup">
            <h1>CREATE AN ACCOUNT</h1>
            <div class="social">
                <a href="https://gmail.com"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                <a href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div><?php echo $show; ?></div>
            <form method="POST">
                <h5>OR ENTER YOUR DETAILS</h5>
                <input type="text" placeholder="FIRST NAME" class="form-control" id="firstName" name="firstName" autocomplete="off" />
                <input type="text" placeholder="LAST NAME" class="form-control" id="lastName" name="lastName" autocomplete="off" />
                <input type="text" placeholder="USER NAME" class="form-control" id="userName" name="userName" autocomplete="off" />
                <input type="email" placeholder="EMAIL" class="form-control" id="email" name="email" autocomplete="off" />
                <input type="password" placeholder="PASSWORD" class="form-control" id="password" name="password" autocomplete="off" />
                <input type="password" placeholder="CONFIRM PASSWORD" class="form-control" id="con_password" name="con_password" autocomplete="off" />
                <input type="number" placeholder="PHONE NUMBER" class="form-control" id="num" name="num" autocomplete="off" />
                <br>
                <!-- <label for="gender" class="text-black">Gender:</label> -->
                <select id="gender" name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>         
                <br>
                <!-- <label for="country" class="text-black">Select Country:</label> -->
                <select id="country" name="country" class="form-control">
                    <option value="">Select Country</option>
                    <option value="algeria">Algeria</option>
                    <option value="angola">Angola</option>
                    <option value="benin">Benin</option>
                    <option value="botswana">Botswana</option>
                    <option value="burkina_faso">Burkina Faso</option>
                    <option value="burundi">Burundi</option>
                    <option value="cape_verde">Cape Verde</option>
                    <option value="cameroon">Cameroon</option>
                    <option value="central_african_republic">Central African Republic</option>
                    <option value="chad">Chad</option>
                    <option value="comoros">Comoros</option>
                    <option value="congo">Congo</option>
                    <option value="democratic_republic_of_the_congo">Democratic Republic of the Congo</option>
                    <option value="djibouti">Djibouti</option>
                    <option value="egypt">Egypt</option>
                    <option value="equatorial_guinea">Equatorial Guinea</option>
                    <option value="eritrea">Eritrea</option>
                    <option value="eswatini">Eswatini</option>
                    <option value="ethiopia">Ethiopia</option>
                    <option value="gabon">Gabon</option>
                    <option value="gambia">Gambia</option>
                    <option value="ghana">Ghana</option>
                    <option value="guinea">Guinea</option>
                    <option value="guinea_bissau">Guinea-Bissau</option>
                    <option value="ivory_coast">Ivory Coast</option>
                    <option value="kenya">Kenya</option>
                    <option value="lesotho">Lesotho</option>
                    <option value="liberia">Liberia</option>
                    <option value="libya">Libya</option>
                    <option value="madagascar">Madagascar</option>
                    <option value="malawi">Malawi</option>
                    <option value="mali">Mali</option>
                    <option value="mauritania">Mauritania</option>
                    <option value="mauritius">Mauritius</option>
                    <option value="morocco">Morocco</option>
                    <option value="mozambique">Mozambique</option>
                    <option value="namibia">Namibia</option>
                    <option value="niger">Niger</option>
                    <option value="nigeria">Nigeria</option>
                    <option value="rwanda">Rwanda</option>
                    <option value="sao_tome_and_principe">Sao Tome and Principe</option>
                    <option value="senegal">Senegal</option>
                    <option value="seychelles">Seychelles</option>
                    <option value="sierra_leone">Sierra Leone</option>
                    <option value="somalia">Somalia</option>
                    <option value="south_africa">South Africa</option>
                    <option value="south_sudan">South Sudan</option>
                    <option value="sudan">Sudan</option>
                    <option value="tanzania">Tanzania</option>
                    <option value="togo">Togo</option>
                    <option value="tunisia">Tunisia</option>
                    <option value="uganda">Uganda</option>
                    <option value="zambia">Zambia</option>
                    <option value="zimbabwe">Zimbabwe</option>
                </select>
                <br>
                <!-- <label for="spec" class="text-black">Select Specialization:</label> -->
                <select id="spec" name="spec" class="form-control">
                    <option value="">Select Specialization</option>
                    <option value="allergy_and_immunology">Allergy and Immunology</option>
                    <option value="anesthesiology">Anesthesiology</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="dermatology">Dermatology</option>
                    <option value="emergency_medicine">Emergency Medicine</option>
                    <option value="family_medicine">Family Medicine</option>
                    <option value="gastroenterology">Gastroenterology</option>
                    <option value="hematology">Hematology</option>
                    <option value="infectious_disease">Infectious Disease</option>
                    <option value="internal_medicine">Internal Medicine</option>
                    <option value="neurology">Neurology</option>
                    <option value="obstetrics_and_gynecology">Obstetrics and Gynecology</option>
                    <option value="oncology">Oncology</option>
                    <option value="ophthalmology">Ophthalmology</option>
                    <option value="orthopedics">Orthopedics</option>
                    <option value="otolaryngology">Otolaryngology</option>
                    <option value="pediatrics">Pediatrics</option>
                    <option value="physical_medicine_and_rehabilitation">Physical Medicine and Rehabilitation</option>
                    <option value="psychiatry">Psychiatry</option>
                    <option value="pulmonology">Pulmonology</option>
                    <option value="radiology">Radiology</option>
                    <option value="rheumatology">Rheumatology</option>
                    <option value="urology">Urology</option>
                    <option value="vascular_surgery">Vascular Surgery</option>
                </select><br>
                <!-- <label for="image" class="text-black">ADD PROFILE PICTURE</label>
                <input type="file" name="image" class="form-control"> -->


                <small>By Clicking "APPLY NOW", You agree to our <br>
                    <a class="text-deco" href="#">Terms and Conditions</a> and <a class="text-deco" href="#">Privacy Policy</a>
                </small>
                <input type="submit" value="APPLY NOW" name="apply" />
                <small class="text-black">ALREADY HAVE AN ACCOUNT ?
                    <a href="./doctor_login.php">SIGN IN</a>
                </small>
            </form>
        </div>
    </div>
    <!-- Register Form ends here. -->
    
</body>
</html>