<?php
  // Gmail Password: yvlbidntdjrtggkr
  // Razorpay API Key : rzp_test_7FLyk3vhhoi8Ni
    function dbConnection()
    {
        $conn = mysqli_connect("localhost", "root", "", "animal_welfare");
        return $conn;
    }

    function addProduct($data)
    {
         
      $cid=$data['categoryid'];
      $scid=$data['subcategoryid'];	
      $pname=$data['pname'];	
      $eng_description=$data['eng_description'];
      $ben_description=$data['ben_description'];

      $fimage=$_FILES["frontimage"]["name"];
      $bimage=$_FILES["backimage"]["name"];

      $target_dir = "products/";
      
      $conn = dbConnection();
      
      $sql="INSERT INTO tblproducts(categoryid, subcategoryid, pname, description_english, description_bengali) VALUES('$cid','$scid','$pname','$eng_description','$ben_description')";
      
   
      
      $res = mysqli_query($conn, $sql);

      
      if ($res == 1) {
        /*
        $productid = mysqli_insert_id($conn);

        $extenstion1 = explode(".", $_FILES["frontimage"]["name"]);
        $frontName = $productid."-front.".$extenstion1[1];

        $extenstion2 = explode(".", $_FILES["backimage"]["name"]);
        $backName = $productid."-back.".$extenstion2[1];

        $target_file1 = $target_dir . $frontName;
        $target_file2 = $target_dir . $backName;

        move_uploaded_file($_FILES["frontimage"]["tmp_name"],$target_file1);
        move_uploaded_file($_FILES["backimage"]["tmp_name"],$target_file2);

        $sql1 = "update tblproducts set image1='$frontName', image2='$backName' where productid='$productid'";
        mysqli_query($conn, $sql1);
        */

        return "Successfully Added New Product";
      }
      else{
        return "Error ".mysqli_error($conn);
      }
      
    }

    function updateProduct($data)
    {
      $pid= $data['pid'] ;
      $cid=$data['categoryid'];
      $scid=$data['subcategoryid'];	
      $pname=$data['pname'];	
      $description_english=$data['description_english'];
      $description_bengali=$data['description_bengali'];

      $conn = dbConnection();
      $sql="update tblproducts set categoryid='$cid', subcategoryid='$scid',pname='$pname',description_english='$description_english', description_bengali='$description_bengali' where productid='$pid'";     
      $res = mysqli_query($conn, $sql);

      if ($res == 1) {
        return "Product Updated Successfully";
      }
      else{
        return "Error ".mysqli_error($conn);
      }
    }

    function deleteProduct($pid)
    {
      
      $conn = dbConnection();
      $sql="delete from tblproducts where productid='$pid'";     
      $res = mysqli_query($conn, $sql);

      if ($res == 1) {

        deleteVolume($pid);

        $res1 = getProduct($pid);
        $data = mysqli_fetch_assoc($res1);
        $fimage = "products/".$data['image1'];
        $bimage = "products/".$data['image2'];
        unlink($fimage);
        unlink($bimage);
        return "Product deleted Successfully";
      }
      else{
        return "Error ".mysqli_error($conn);
      }
    }

    function getProduct($pid)
    {
      $conn = dbConnection();
      $sql="select *from tblproducts where productid='$pid'";     
      $res = mysqli_query($conn, $sql);

      return $res;
    }    

    //insert prodeuct volume
    function addVolume($data)
    {
      $product_id=$data['pid'];	
      $product_volume=$data['volume'];
      $product_price=$data['price'];

      $conn = dbConnection();
      $sql="INSERT INTO tblvolume(productid, volume, price) VALUES('$product_id','$product_volume','$product_price')";
      $res = mysqli_query($conn, $sql);

      if ($res == 1) {
        return "Product of this volume added Successfully";
      }
      else{
        return "Error ".mysqli_error($conn);
      }
    }

    
    function deleteVolume($pid)
    {
      $conn = dbConnection();
      $sql="delete from tblvolume where productid='$pid'";
      $res = mysqli_query($conn, $sql);

      if ($res == 1) {
        return "Volume deleted Successfully";
      }
      else{
        return "Error ".mysqli_error($conn);
      }
    }

    function loginAdmin($data)
    {
      $adminid=$data['adminid'];
      $password=$data['password'];

      $conn = dbConnection();

      $sql = "select *from admin where email='$adminid' and password='$password'";

      $res = mysqli_query($conn, $sql);

      if(mysqli_num_rows($res))
      {
          return $res;
      }
      else{
        return null;
      }
    }

    // table record counter

    function countCategory()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblcategory";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countSubCategory()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblsubcategory";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countProducts()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblproducts";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countCareer()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblcareer";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countEnquiry()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblenquiry";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countFeedback()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblfeedback";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countMedia()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblmedia";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countUsers()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblusers";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

    }

    function countPages()
    {
      $conn = dbConnection();

      $sql = "select count(*) as total from tblpages";

      $res = mysqli_query($conn, $sql);

      $data = mysqli_fetch_assoc($res);

      $total = $data['total'];

      mysqli_close($conn);

      return $total;

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

?>