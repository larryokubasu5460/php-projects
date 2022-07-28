<?php

class Login extends Dbh {

    protected function getUser($uid,$pwd){
        $sql = 'SELECT users_uid, users_pwd FROM users WHERE users_uid = ? AND users_pwd = ?';
        $stmt = $this->connect()->prepare($sql);

        $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid,$hashpwd))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}