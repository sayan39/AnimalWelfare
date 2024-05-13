<?php
    include("API/MyMethods.php");
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


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="text-uppercase text-white mb-lg-4">They need your Love & care</h1><br><br><br>
                    <h3 class="text-uppercase text-dark mb-lg-4">Their Lives Matter, <br>Rescue Stray Animals</h3>
                    <!-- <p class="fs-4 text-white mb-lg-4">Dolore tempor clita lorem rebum kasd eirmod dolore diam eos kasd. Kasd clita ea justo est sed kasd erat clita sea</p> -->
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="post_rescue.php" class="btn btn-outline-dark border-2 py-md-3 px-md-5 me-5">POST FOR RESCUE</a>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 100%;">
                <h4 class="text-primary text-uppercase">
                    Recent Rescue of Stray Animals
                </h4>
                
            </div>
            <div class="row g-5">
                <?php
                    $res = getLimitedRescue();

                    $records = mysqli_num_rows($res);

                    if($records > 0)
                    {
                        while($data = mysqli_fetch_assoc($res))
                        {
                            echo '
                            <div class="col-lg-6">
                                <div class="blog-item">
                                    <div class="row g-0 bg-light overflow-hidden">
                                        <div class="col-12 col-sm-5 h-100">
                                            <img class="img-fluid h-100" src="'.$data['image'].'" style="object-fit: cover;">
                                        </div>
                                        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                                            <div class="p-4">
                                                <div class="d-flex mb-3">
                                                    <small><i class="bi bi-calendar-date me-2"></i>'.$data['rescue_date'].'</small>
                                                </div>
                                                <h5 class="text-uppercase mb-3">'.$data['name'].'</h5>
                                                <h5 style="text-align: justify;" class="mb-3">'.$data['description'].'</h5>
                                                <h5 style="text-align: justify;" class="">From</h5>
                                                <p style="text-align: justify;"><b>'.$data['address'].'</b></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                        
                    }
                    else{
                        echo '
                            <div class="col-lg-6">
                                <h3>There are no recent Rescue.</h3>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h4 class="text-primary text-uppercase">Stray Animal Rescue Members</h4>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
            <?php
                    $res = getAllMembers();

                    $records = mysqli_num_rows($res);

                    if($records > 0)
                    {
                        while($data = mysqli_fetch_assoc($res))
                        {
                            echo '
                                <div class="team-item">
                                    <div class="position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="'.$data['image'].'" alt="" height="100px" width="150px">
                                        <div class="team-overlay">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-light text-center p-4">
                                        <h5 class="text-uppercase">'.$data['name'].'</h5>
                                        <p class="m-0">'.$data['address'].' </p>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    else{
                        echo '
                            <div class="col-lg-6">
                                <h3>There are no Members.</h3>
                            </div>
                        ';
                    }
            ?>
                
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-testimonial py-5" style="margin: 45px 0;">
        <div class="container py-5">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel bg-white p-5">
                    <?php
                        $res = getAllFeedbacks();

                        $records = mysqli_num_rows($res);

                        if($records > 0)
                        {
                            while($data = mysqli_fetch_assoc($res))
                            {
                                $userid = $data['userid'];
                                $res1 = findUserData($userid);
                                $details = mysqli_fetch_assoc($res1);
                                echo '
                                    <div class="testimonial-item text-center">
                                        <div class="position-relative mb-4">
                                            <img class="img-fluid mx-auto" src="img/feedback.png" alt="">
                                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                                <i class="bi bi-chat-square-quote text-primary"></i>
                                            </div>
                                        </div>
                                        <p>'.$data['message'].'</p>
                                        <hr class="w-25 mx-auto">
                                        <h5 class="text-uppercase">'.$details['name'].'</h5>
                                        <span>'.$details['address'].'</span>
                                    </div>
                                ';
                            }
                        }
                        else{
                            echo '
                                <div class="col-lg-6">
                                    <h3>There are no feedbacks.</h3>
                                </div>
                            ';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    
    

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