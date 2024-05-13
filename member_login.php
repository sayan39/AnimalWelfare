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
                    <span>Rescue Member Login</span>
                    <!-- <button class="btn" style="background-color: #64B62E;color:white; margin-left: 52%;">POST FOR RESCUE</button> -->
                </h4>
                
            </div>
            
            <form class="row g-3" style="width: 100%;">
                <div class="col-lg-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Enter Userid</label>
                            <input type="email" class="form-control" id="userid" >
                        </div>
                        
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Enter Password</label>
                            <input type="email" class="form-control" id="password">
                        </div>
            
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="col-md-12">
                            <span>New Member Registration? </span><a href="member_registration.php">click here</a>
                        </div>
                    </div>
                </div>

                   
            </form>
    
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