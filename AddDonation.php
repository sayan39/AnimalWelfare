<?php
    session_start();
    ob_start();

    $userid = $_POST['userid'];
    $amount = $_POST['amount'];
    $transactionid = $_POST['transactionid'];
    $status = $_POST['status'];

    $conn = mysqli_connect('localhost', 'root', '', 'animal_welfare');

    $sql = "insert into donation(userid, amount, transactionid, status) values('$userid', '$amount', '$transactionid', '$status')";

    $res = mysqli_query($conn, $sql);

    if($res == 1)
    {
        echo "Donate Successfully...!!!";
    }
    else{
        echo "Donate Failed";
    }
?>