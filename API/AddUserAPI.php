<?php
    include('MyMethods.php');

    //session_start();
    
    parse_str($_POST['data'], $data);

    echo "Name: ".$data['name'];

    // $res = addUser($data);

    // if(mysqli_num_rows($res) > 0)
    // {
    //     $data = mysqli_fetch_assoc($res);
    //     $_SESSION['user'] = $data;

    //     echo "success";
    // }
    // else{
    //     echo "error";
    // }
?>