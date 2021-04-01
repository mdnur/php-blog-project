<?php

/**
 * Created by PhpStorm.
 * User: MD Nur
 * Date: 1/25/2017
 * Time: 1:05 PM
 */
class User extends Main{
    protected $table = "tbl_user";
    private $username;
    private $password;
    private $role;
    private $name;
    private $email;
    private $details;



    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }


    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDetails($details) {
        $this->details = $details;
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

    public function UsernameRow(){
        $sql  = "SELECT COUNT(*) as totalRow  FROM ".$this->table." WHERE username =:username ";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":username",$this->username);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalRow'];
    }

    public function EmailRow(){
        $sql  = "SELECT COUNT(*) as totalRow  FROM ".$this->table." WHERE email =:email ";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":email",$this->email);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalRow'];
    }



    public function readByUsername(){
        $sql ="SELECT * FROM ".$this->table." WHERE username =:username";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":username",$this->username);
        $stmt->execute();
        return $stmt->fetch();
    }




    public function Insert() {
        if(empty($this->username)){
            echo "<p class='bg-danger' style='padding: 18px;text-align: center;'>username must not be empty</p>";
        }elseif (empty($this->password)){
            echo "<p class='bg-danger' style='padding: 18px;text-align: center;'>password must not be empty</p>";
        }elseif (empty($this->role)){
            echo "<p class='bg-danger' style='padding: 18px;text-align: center;'>role must not be empty</p>";
        }else{
            if ($this->UsernameRow() == 0 ){
                $query ="INSERT INTO ".$this->table." (username,password,role) VALUES (:username,:password,:role)";
                $stmt =Database::prepare($query);
                $stmt->bindParam(":username",$this->username );
                $stmt->bindParam(":password",$this->password );
                $stmt->bindParam(":role",$this->role );
                return $stmt->execute();
            }else{
                echo "<p class='bg-danger' style='padding: 18px;text-align: center;'>Username already taken </p>";
            }
        }

    }

    public function update($id) {
        if(empty($this->name)){
            echo "<p class='bg-danger' style='padding: 18px;text-align: center;'>username must not be empty</p>";
        }elseif (empty($this->email)){
            echo "<p class='bg-danger' style='padding: 18px;text-align: center;'>password must not be empty</p>";
        }else{
                $query ="UPDATE ".$this->table." SET  name = :name ,email =:email,details=:details WHERE id = :id ";
                $stmt =Database::prepare($query);
                $stmt->bindParam(":name",$this->name);
                $stmt->bindParam(":email",$this->email);
                $stmt->bindParam(":details",$this->details);
                $stmt->bindParam(":id",$id );
                return $stmt->execute();

        }
    }

}
