<?php
    include('API/MyMethods.php');
    $message = "";
    $email = "";
    if(!isset($_SESSION['email']))
    {
        $message = "Please login 1st to submit your feedback";
    }
    else 
    {
        $email = $_SESSION['email'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Animal Welfare</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php
        include('includes/csslink.php');
    ?>
</head>

<body>
    
    <?php
        include('includes/topbar.php');
        include('includes/headers.php');
    ?>

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Services</h6>
                <h4 class="display-12 text-uppercase mb-0">Our Excellent Services for Stray Animals.</h4>
            </div>
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-house display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Feeding</h5>
                            <p>My Team will try to feed stray animals.</p>
                            <!-- <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-food display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Treatment</h5>
                            <p style="text-align: justify;">My Team is always to help or give at least minimum First Aid Treatment before reached Any nearest Clinic.</p>
                            <!-- <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-grooming display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Veterinary Care</h5>
                            <p></p>
                            <!-- <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="flaticon-cat display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Lives</h5>
                            <p></p>
                            <!-- <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
    

    <?php
        include('includes/footer.php');
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php
        include('includes/jslink.php');
    ?>


    
</body>

</html>