<!-- Navbar Start -->
<?php
    $email = "";
    if(isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
    }
?>

<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="index.html" class="navbar-brand ms-lg-5">
        <h4 class="m-0 text-uppercase text-dark"><i class="bi bi-shop fs-1 text-primary me-3"></i>Animal Welfare</h4>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="./index.php" class="nav-item nav-link">Home</a>
            <a href="./aboutus.php" class="nav-item nav-link">About</a>
            <a href="./services.php" class="nav-item nav-link">Service</a>
            <a href="./rescue.php" class="nav-item nav-link">Rescue</a>
            <a href="./feedback.php" class="nav-item nav-link">Feedback</a>
            <!-- <a href="#" class="nav-item nav-link">Adoption</a> -->
            <?php
               
                if(isset($_SESSION['email']))
                {
                    echo '<a href="./logout.php" class="nav-item nav-link">Logout</a>';
                }
                else{
                    echo '<a href="./user_login.php" class="nav-item nav-link">Login</a>';
                }
            ?>
            
            <a href="donate.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Donate <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</nav>
<!-- Navbar End -->