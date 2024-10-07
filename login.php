<?php
    include("conn.php");
    session_start();

    if(isset($_POST["login"])){

        $email = $_POST["email"];
        $pass = $_POST["pass"];

       $mera_query =  "select * from user where email = '$email' and password = '$pass'";
       $data_match_hua =  mysqli_query($con,$mera_query);
       $row =  mysqli_num_rows($data_match_hua);

       if($row == 1){
        $_SESSION['useremail'] =  $email;
        echo "<script>alert('Login successfull !')</script>";
        header("Refresh:0;url=profile.php");
       }else{
        echo "<script>alert('Email or passoword is incorrect !')</script>";
        header("Refresh:0;url=user.html");
       }
       
       
       



    }
?>