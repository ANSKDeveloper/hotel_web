<?php
    include("conn.php");

    if(isset($_POST["register"])){

        $user = $_POST["user"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];

       $mera_query =  "insert into user(username,email,password) values('$user','$email','$pass')";
       mysqli_query($con,$mera_query);
       
       echo "<script>alert('Registration successfull !')</script>";
       header("Refresh:0;url=user.html");



    }
?>