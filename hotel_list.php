<?php
  include("conn.php");

  if(isset($_POST["save"])){
    $hotel_name = $_POST['hotel_name'];
    $locations = $_POST['locations'];
    $price = $_POST['price'];
    $details = $_POST['details'];

    /* Photo name*/
    $file_name = $_FILES['myPhoto']['name'];
    /* Temprory name of photo */
    $temp_name = $_FILES['myPhoto']['tmp_name'];
    /* folder name to store photo */
    $folder_name = "hotel/".$file_name;

    $mysq = "insert into hotel_list(hotel_name,location,price,detail,photo) values('$hotel_name','$locations','$price','$details','$file_name')";
    $res = mysqli_query($con,$mysq);

    if(move_uploaded_file($temp_name,$folder_name)){

        if($res == true){

            echo "<script>alert('Listed successed !')</script>";
            header("Refresh:0;url=profile.php");
        }else{
            echo "<script>alert('Listed failed !')</script>";
            header("Refresh:0;url=listing.php");
        }
    }
   
   

   


    
  }
?>