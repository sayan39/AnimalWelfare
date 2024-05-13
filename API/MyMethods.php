<?php
    include('./phpmailer/PHPMailerAutoload.php');
    session_start();
    ob_start();
    function connect()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'animal_welfare');
        return $conn;
    }

    function addUser($user)
    {
        $conn = connect();

        $email = $user['email'];
        $name = $user['name'];
        $password = $user['password'];
        $contact = $user['contact'];
        $address = $user['address'];

        $sql = "INSERT INTO users(email, name, password, contact, address) values('$email', '$name', '$password', '$contact', '$address')";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function addMembers($user)
    {
        $conn = connect();

        $email = $user['email'];
        $name = $user['name'];
        $password = $user['password'];
        $contact = $user['contact'];
        $address = $user['address'];
        $pincode = $user['pincode'];

        $target_dir = "members/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
        {
            $sql = "INSERT INTO members(memberid, name, password, contact, address, pincode, image) values('$email', '$name', '$password', '$contact', '$address', '$pincode', '$target_file')";

            $res = mysqli_query($conn, $sql);

            if($res == 1){
                return "Member Registration Successfully...!!!";
            }
            else{
                return "Member Registration Failure";
                //return mysqli_error($conn);
            }
        }
        else {
            return "File not uploaded";
        }
       
    }

    function userLogin($user)
    {
        $conn = connect();

        $email = $user['email'];
        $password = $user['password'];

        $sql = "select *from users where email='$email' and password='$password'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function sendFeedback($user)
    {
        $conn = connect();

        $email = $user['email'];
        $message = $user['message'];

        $sql = "INSERT INTO feedback(userid, message) values('$email', '$message')";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function needRescue($data)
    {
        $userid = $data['userid'];
        $name = $data['name'];
        $description = $data['description'];
        $address = $data['address'];
        $city = $data['city'];
        $state = $data['state'];
        $full_address = $address.", ".$city.", ".$state;
        $pincode = $data['pincode'];
        $urlatt = $data['urlatt'];
        $urlng = $data['urlng'];

        $conn = connect();

        $target_dir = "rescue/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
        {
            $sql = "insert into rescue(userid, name, address, pincode, latitute, longitute, description, image) values('$userid', '$name', '$address', '$pincode', '$urlatt', '$urlng', '$description', '$target_file')";

            $res = mysqli_query($conn, $sql);

            if($res == 1){

                $res1 = getAllMembers();

                while($data1 = mysqli_fetch_assoc($res1))
                {
                    if($data1['pincode'] == $pincode)
                    {
                        sendNotificationToMember($data);
                    }
                }
                return "Your Post for rescue sent Successfully...!!!";
            }
            else{
                return "Somthing error, Try again later";
                //return mysqli_error($conn);
            }
        }
        else {
            return "File not uploaded";
        }
    }

    function sendNotificationToMember($data)
    {
        $mail = new phpmailer;
		$mail->isSMTP();  //Only enable when use in local server 

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';

		$mail->Username = 'animalwelfaremca@gmail.com'; //company emailid
		$mail->Password = 'yvlbidntdjrtggkr';

		$mail->setFrom('animalwelfaremca@gmail.com', 'Animal Welfare'); //company emailid and company name
		$mail->addAddress($data['userid']);
		$mail->addReplyTo('animalwelfaremca@gmail.com');

		$mail->isHTML(true);
		$mail->Subject = 'Stray Animal Rescue Notification';
        $message = "";
        $message = $message."<h3>Rescue for stray ".$data['name']."</h3>"."\n";
        $message = $message."<h3>".$data['description']."</h3>"."\n";
        $message = $message."<h3>".$data['address']."</h3>"."\n";
        $message = $message."<h3>".$data['pincode']."</h3>"."\n";
        $message = $message."<h3>Location: http://maps.google.com/?q=".$data['latitute'].",".$data['longitute']."</h3>"."\n";
		$mail->Body = $message;

		if(!$mail->send())
		{
			return 0;
		}
		else{
			return 1;
		}
    }

    function getLimitedRescue()
    {
        $conn = connect();

        $sql = "select *from rescue limit 2";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function getAllRescue()
    {
        $conn = connect();

        $sql = "select *from rescue";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function getAllMembers()
    {
        $conn = connect();

        $sql = "select *from members";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function getAllFeedbacks()
    {
        $conn = connect();

        $sql = "select *from feedback";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function getUsersById($userid)
    {
        $conn = connect();

        $sql = "select *from users where userid='$userid'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function findUserData($userid)
    {
        $conn = connect();

        $sql = "select *from users where email='$userid'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

?>