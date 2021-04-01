<?php

/**
 * Created by PhpStorm.
 * User: MD Nur
 * Date: 1/24/2017
 * Time: 7:17 PM
 */
class Massage   extends Main{
    protected $table ="tbl_massage";
    private $name;
    private $email;
    private $massage;


    /**
     * @param mixed $title
     */
    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email =$email;
    }

    public function setMassage($massage){
        $this->massage =$massage;
    }

    public function Insert() {
        if(empty($this->name)){
            echo "<p class='bg-danger big' style='padding: 18px;text-align: center;'>Name must not be empty</p>";
        }elseif (empty($this->email)){
            echo "<p class='bg-danger big' style='padding: 18px;text-align: center;'>Email must not be empty</p>";
        }elseif (empty($this->massage)){
            echo "<p class='bg-danger big' style='padding: 18px;text-align: center;'>Massage must not be empty</p>";
        }elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            echo "<p class='bg-danger big' style='padding: 18px;text-align: center;'>Invalid email format</p>";
        }else{
            $query ="INSERT INTO ".$this->table." (name,email,massage) VALUES (:name,:email,:massage)";
            $stmt =Database::prepare($query);
            $stmt->bindParam(":name",$this->name );
            $stmt->bindParam(":email",$this->email );
            $stmt->bindParam(":massage",$this->massage );
            return $stmt->execute();
        }
    }

    public function update($id) {
        $query ="UPDATE ".$this->table." SET  title = :title ,body =:body WHERE id = :id ";
        $stmt =Database::prepare($query);
        $stmt->bindParam(":title",$this->title);
        $stmt->bindParam(":body",$this->body);
        $stmt->bindParam(":id",$id );
        return $stmt->execute();
    }


    public function readAllLimit(){
        $sql ="SELECT * FROM ".$this->table." ORDER BY id DESC LIMIT 5";
        $stmt =Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function CountRow(){
        $status = 0;
        $sql  = "SELECT COUNT(*) as totalRow  FROM ".$this->table." WHERE status =:status" ;
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalRow'];
    }


    public function readALLbyStatus($status){
        $sql ="SELECT * FROM ".$this->table." WHERE status =:status  ORDER BY id DESC";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateStatus($status,$id){
        $query ="UPDATE ".$this->table." SET  status = :status  WHERE id = :id ";
        $stmt =Database::prepare($query);
        $stmt->bindParam(":status",$status);
        $stmt->bindParam(":id",$id );
        return $stmt->execute();
    }

}
