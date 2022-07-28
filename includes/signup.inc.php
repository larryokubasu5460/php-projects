<?php


if(isset($_POST["submit"])){
    
    //grab data from the post method
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    //instantiate signup controller
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";


    $newUser = new SignupContr($uid,$pwd,$pwdRepeat,$email);
   
    //run error handlers and user signup
    $newUser->signupUser();
    //going back to front page
    header("location:../index.php?error=none");
}