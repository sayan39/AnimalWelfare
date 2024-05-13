<?php
    include('API/MyMethods.php');
    $message = "";
    $email = "";
    if(!isset($_SESSION['email']))
    {
        $message = "Please login 1st to post a rescue for stray animals";
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

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 100%;">
                <h4 class="text-primary text-uppercase">
                    <a href="post_rescue.php" class="btn btn-outline-dark border-2 py-md-3 px-md-5 me-5">POST FOR RESCUE</a>
                    <span style="margin-left: 42%;">Rescue of Stray Animals</span>
                    <!-- <button class="btn" style="background-color: #64B62E;color:white; margin-left: 52%;">POST FOR RESCUE</button> -->
                </h4>
                
            </div>
            <div class="row g-5">
            <?php
                    $res = getAllRescue();

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