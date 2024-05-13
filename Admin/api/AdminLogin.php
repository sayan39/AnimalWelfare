<?php
    include('mymethods.php');

    session_start();

    $res = loginAdmin($_POST);

    if($res == null)
    {
        echo '0';
    }
    else{
        $data = mysqli_fetch_assoc($res);
        $_SESSION['adminid'] = $data['email'];
        $_SESSION['name'] = $data['name'];
        echo '1';
    }
?>