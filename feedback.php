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

    <!-- Blog Start -->
    <div class="container-fluid py-5" style="margin-bottom: 30px;">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 100%;">
                <h4 class="text-primary text-uppercase">
                    <span>Give us your valuable Feedback</span>
                    <!-- <button class="btn" style="background-color: #64B62E;color:white; margin-left: 52%;">POST FOR RESCUE</button> -->
                </h4>

                <h5><?php echo $message;?></h5>
                
            </div>
            
            <form class="row g-3" style="width: 100%;" action="" method="post">
                <div class="col-lg-6">
                    <div class="row g-3">

                        <input type="hidden" name="email" value="<?php echo $email;?>">
                        
                        <div class="col-12">
                            <textarea rows="5" class="form-control" id="message" name="message" placeholder="Write your feedback...."></textarea>
                        </div>

                       
                        
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div class="col-md-12">
                            <?php
                                if(isset($_POST['submit']))
                                {
                                    $res = sendFeedback($_POST);
                                    

                                    if($res == 1)
                                    {
                                        echo '<h5 class="text-success">Feedback sent successfully</h5>';
                                    }
                                    else{
                                        echo '<h5 class="text-danger">Feedback Not Sent</h5>';
                                    }
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