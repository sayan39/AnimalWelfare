<?php
    include('API/MyMethods.php');
    $message = "";
    $email = "";
    if(!isset($_SESSION['email']))
    {
        $message = "Please login 1st to Donate";
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
    <div class="container-fluid py-5" style="margin-bottom:130px">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 100%;">
                <h4 class="text-primary text-uppercase">
                    <span>Donate for Stray Animals </span>
                    <!-- <button class="btn" style="background-color: #64B62E;color:white; margin-left: 52%;">POST FOR RESCUE</button> -->
                </h4>
                <h5><?php echo $message;?></h5>
            </div>
            
            <div class="row g-3" style="width: 100%;">
                <div class="col-lg-4">
                    <div class="row g-3">
                        <input type="hidden" class="form-control" id="userid" value="<?php echo $email;?>">

                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Contact No</label>
                            <input type="number" class="form-control" id="contact" required>
                        </div>

                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" required>
                        </div>
            
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" onclick="donate()">Donate</button>
                        </div>

                        <div class="col-12">
                            <h4 id="message"></h4>
                        </div>

                    </div>
                </div>                   
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

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function donate()
        {
            var userid = document.getElementById("userid").value;
            var amount = document.getElementById("amount").value;
            var contact = document.getElementById("contact").value;

            if(amount == 0 || amount == "" || contact == "")
            {
                document.getElementById('message').innerHTML = "<h5 class='text-danger'>Please fill all the detail</h5>";
            }
            else{
                var options = {
                "key": "rzp_test_7FLyk3vhhoi8Ni", // Enter the Key ID generated from the Dashboard
                "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Animal Welfare", //your business name
                "description": "Donation",
                "image": "img/logo.png",
                "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                    "name": "", //your customer's name
                    "email": userid,
                    "contact": contact //Provide the customer's phone number for better conversion rates 
                },
                "handler": function (response){
                    alert(response.razorpay_payment_id);
                    // alert(response.razorpay_order_id);
                    // alert(response.razorpay_signature)
                    //Sent data to the database & redirent to the thank you page
                    //ajax call
                    
                    $.ajax({
                        type: "POST",
                        url: "AddDonation.php",
                        data: {"transactionid": response.razorpay_payment_id,"userid": userid, "amount": amount, "status": "success"},
                        success: function(response){
                            //alert(response);
                            document.getElementById('message').innerHTML = "<h5 class='text-success'>Thank you for your donation</h5>";

                            document.getElementById("amount").value = "";
                            document.getElementById("contact").value = "";
                    }
                    });
                    
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
            }
            
        }
    </script>

    
</body>

</html>