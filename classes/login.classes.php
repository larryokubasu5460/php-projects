<?php

class Login extends Dbh {

    protected function getUser($uid,$pwd){
        $sql = 'SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($uid,$pwd))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt = null;
            header("location:../index.php?errors=usernotfound");
            exit();
        }

        $hashpwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($pwd,$hashpwd[0]["users_pwd"]);

        if($checkpwd == false ){
            $stmt=null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkpwd == true){
            $sql = 'SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?';
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute(array($uid,$uid,$pwd))){
                $stmt = null;
                header("location:../index.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()==0){
                $stmt=null;
                header("location:../index.php?error=usrjnwrgjsfn");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            $stmt = null;
        }
        $stmt = null;
    }
}