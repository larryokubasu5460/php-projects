<?php


if(isset($_POST["submit"])){
    
    //grab data from the post method
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];


    //instantiate Login controller
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";


    $login = new LoginContr($uid,$pwd);
   
    //run error handlers and user signup
    $login->loginUser();
    //going back to front page
    header("location:../index.php?error=none");
}
