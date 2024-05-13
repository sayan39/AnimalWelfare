<?php
    include('API/MyMethods.php');
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
                    <span>New Member Registration</span>
                    <!-- <button class="btn" style="background-color: #64B62E;color:white; margin-left: 52%;">POST FOR RESCUE</button> -->
                </h4>
                
            </div>
            
            <form class="row g-3" style="width: 100%;" action="" method="post" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>

                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                        </div>

                        <div class="col-md-6">
                            <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Contact" required>
                        </div>
                        
                        <div class="col-12">
                            <textarea rows="3" class="form-control" id="address" name="address" placeholder="Enter Your Address" required></textarea>
                        </div>

                        <div class="col-12">
                            <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter your pincode" required>
                        </div>

                        <div class="col-12">
                            <input type="file" class="form-control" id="image" name="image" >
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                        </div>

                        <div class="col-md-12">
                            <?php
                                if(isset($_POST['register']))
                                {
                                    $res = addMembers($_POST);                                  

                                
                                    echo '<h3 class="text-success">'.$res.'</h3>';
                                    
                                }
                            ?>
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

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        function addUser()
        {
            //var data = $('form').serialize();
            let myform = document.getElementById("myform");
            let data = new FormData(myform);

            $.ajax({
                url:"API/AddUserAPI.php",
                method:"POST",
                data:{'data' : data},
                success: function(response)
                {
                    alert(response);
                }
            })
        }
    </script>

    <?php
        include('includes/jslink.php');
    ?>


    
</body>

</html>