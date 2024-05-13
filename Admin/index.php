<?php
   session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Admin Login</title>
    <link rel="stylesheet" href="index/login.css">
</head>
<body>

    <form class="box" onsubmit="event.preventDefault(); login();">
        <div class="container">

            <div class="top">
                <header>
                    <img class="logo" src="images/logo.png" alt="" style="width:40%; height:140px;border-radius:50%">
                </header>
            </div>

            <div class="input-field">
                <input type="text" class="input" placeholder="Enter Admin Id" id="adminid" name="adminid" required>
                <i class='bx bx-user' ></i>
            </div>

            <div class="input-field">
                <input type="Password" class="input" placeholder="Enter Password" id="password" name="password" required>
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="input-field">
                <input type="submit" class="submit" value="Login" id="">
            </div>

            <div class="two-col">
                <div class="one">
                <!-- <input type="checkbox" name="" id="check">
                <label for="check"> Remember Me</label> -->
                </div>
                <div class="two">
                    <!-- <label><a href="#">Forgot password?</a></label> -->
                </div>
            </div>
        </div>  
    </form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function login()
    {
                
        $.ajax({
            url:"api/AdminLogin.php",
            method:"POST",
            data:$('form').serialize(),
            success: function(response)
            {                                             
                if(response === "1")
                {
                                      
                    Swal.fire({
                        title: 'Login successful',
                        text: "",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Dashboard'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            
                            window.location.href = './dashboard.php';
                        }
                    })
                }
                else{
                    Swal.fire(
                        'Invalid Adminid or Password','',
                        'error'
                    )
                }
            }
        })
    }
   
</script>


</body>
</html>

