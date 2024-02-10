<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!--    CSS File  -->
    <link rel="stylesheet" href="./css/style.css">

    <title> VERI HOSPITAL MANAGEMENT SYSTEM </title>
    <?php
        include_once("./header.php");
    ?>
</head>
<body>

    <div id="carouselExampleCaptions" class="carousel carousel-dark slide carousel-fade" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>

        <div class="carousel-inner carousel_inner_img">
            <div class="card text-dark carousel-item carousel_item_img active" data-bs-interval="3000">
                <img src="./images/med-recep.jpg" class="card-img" alt="...">

                <div class="card-img-overlay bg_image_best img-fluid img-thumbnail rounded">
                    <h1 class="card-title">Best Choice For <br> Medical Health Care</h1>
                    <p class="card-text">We learn about the most ideal option or healthcare <br> provider to ensure optimal outcomes, taking into <br> consideration factors such as quality of care, patient <br> preferences, and the effectiveness of medical practices.</p>
                </div>
            </div>

            <div class="carousel-item carousel_item_img" data-bs-interval="3000">
                <img src="./images/admin1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>ADMINISTRATION</h5>
                    <p>Administer your website with ease and precision.</p>
                </div>
            </div>

            <div class="carousel-item carousel_item_img" data-bs-interval="3000">
                <img src="images/patient3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>DOCTOR</h5>
                    <p>Enhance lives, we're hiring doctors.</p>
                </div>
            </div>

            <div class="carousel-item carousel_item_img" data-bs-interval="3000">
                <img src="./images/Medical-Receptionist.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>MEDICAL ADMINISTRATION</h5>
                    <p>Elevate patient experience with Medical Reception.</p>
                </div>
            </div>

            <div class="carousel-item carousel_item_img" data-bs-interval="3000">
                <img src="./images/nurse4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>NURSE STATION</h5>
                    <p>Delivering care with compassion, one click away.</p>
                </div>
            </div>

            <div class="carousel-item carousel_item_img" data-bs-interval="3000">
                <img src="./images/patient6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>PATIENT</h5>
                    <p>Empowering patients with care, click for support.</p>
                </div>
            </div>
            
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>


    <section class="section_img1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                    <img src="./images/wood.png" alt="">
                </div>
                <div class="col-md-2 bg_image_wood">
                    <h1 class="card-title">Provide Best Quality <br> Healthcare For You</h1>
                    <p class="card-text">
                    <ul>
                        <li>Affordable monthly premium packages</li>
                        <li>Choose your favourite services</li>
                        <li>Only use friendly environment</li>
                    </ul>
                    </p>
                </div>
                <div class="col ipad_display">
                    <img src="./images/ipad_view_2.png" class="img-fluid" alt="...">
                </div>
            </div>
            <div class="row g-0">
                <img src="./images/Specialized_Training.png" class="img-fluid" alt="...">
            </div>
        </div>
    </section>
    <div class="container-fluid text-center">
                <div class="card mb-3" style="width: 100%;">

                </div>  
        </div>
    
</body>
</html>