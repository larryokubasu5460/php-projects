<?php

class SignupContr extends Signup{
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;

    public function __construct($uid,$pwd,$pwdrepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser(){
        if($this->emptyInput() == true){
            //error empty field
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if(!$this->invalidUid() == false){
            //error invalid uid
            header("location: ../index.php?error=invalidUid");
            exit();
        }
        if(!$this->invalidEmail()==false){
            //error invalid email
            header("location:../index.php?error=invalidemail");
            exit();
        }
        if(!$this->pwdMatch()==false){
            //password mismatch
            header("location:../index.php?error=passwordmismatch");
            exit();
        }
        if($this->uidTakenCheck()==false){
            //user already exists
            header("location:../index.php?error=uidexists");
            exit();
        }
        $this->setUser($this->uid,$this->pwd,$this->email);
    }

    private function emptyInput(){
        $result;
        if(empty($this->uid)|| empty($this->pwd)||empty($this->pwdrepeat)||empty($this->email)){
            $result = true;
        }
        else{
            $result = false;
        }
    }
    private function invalidUid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        }
        else{
            $result=true;
        }
    }
    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true;
        }
    }
    private function pwdMatch()
    {
        $result;
        if($this->pwd !== $this->pwdrepeat){
            $result = false;
        }else{
            $result = true;
        }
    }
    private function uidTakenCheck(){
        $result;
        if(!$this->checkUser($this->uid,$this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}