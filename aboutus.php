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

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">About Us</h6>
                        <h3 class="display-12 text-uppercase mb-0">It is so easy to make them Happy.</h3>
                    </div>
                    
                    <div class="bg-light p-4">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                    aria-selected="true">Our Mission</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                    aria-selected="false">Our Vission</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                <p class="mb-0" style="text-align: justify;"><b>
                                India is home to more than 15 million street dogs, more than 5 million stray cows, and a large unreported number of stray cats. 
                                However, stray animals who do not have access to this medical care because of their geographical location away from city centres, If street animals in India meet with an injury, they do not receive medical care at the right time. Due to limited resources in their region, these animals suffer in pain and agony, to no avail, until their last breath.    
                                <br><br>
                                Our Mission for those animals, find a proper shelter, give a quick and immediate treatment, take care, and feed them as there is nobody to help them. 
                                </b></p>
                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                <p class="mb-0">
                                <b>
                                    <ul>
                                        <li>
                                            If people see animals in need and they want to contact us, they have to login to our website with valid information and provide us photos, location so that we can reach there to rescue the animals.
                                        </li>
                                        <li>
                                            People can post photos and information about the stray animals in our page.
                                        </li>
                                        <li>
                                            People can adopt animals from our website.
                                        </li>
                                        <li>
                                            WE Provide 24 hours immediate and emergency response.
                                        </li>
                                        <li>
                                            If any accident occurs, our team will immediately reach there to rescue them and provide treatment to the injured animal.
                                        </li>
                                    </ul>
                                </b>    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


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