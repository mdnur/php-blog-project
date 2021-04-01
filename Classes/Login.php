<?php

/**
 * Created by PhpStorm.
 * User: MD Nur
 * Date: 1/24/2017
 * Time: 3:30 PM
 */
class Login extends Main{
    protected $table = "tbl_user";
    private $username;
    private $password;



    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }




    public function ChechRow(){
        $sql  = "SELECT COUNT(*) as totalRow  FROM ".$this->table." WHERE username =:username AND password =:password";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":username",$this->username);
        $stmt->bindParam(":password",$this->password);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalRow'];
    }


    public function readByUsername(){
        $sql ="SELECT * FROM ".$this->table." WHERE username =:username AND password =:password";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":username",$this->username);
        $stmt->bindParam(":password",$this->password);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function Insert() {

    }

    public function update($id) {

    }

}
