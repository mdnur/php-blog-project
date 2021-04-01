<?php


class Catagory extends Main{
    protected $table = "tbl_catagory";
    private $cat;
    
    
    
    public function setCat($cat) {
        $this->cat = $cat;
    }

        

    public function Insert() {
        $query ="INSERT INTO ".$this->table." (name) VALUES (:name)";
        $stmt =Database::prepare($query);
        $stmt->bindParam(":name",$this->cat );
        return $stmt->execute();
    }

    public function update($id) {
        $query ="UPDATE ".$this->table." SET  name = :name WHERE id = :id ";
        $stmt =Database::prepare($query);
        $stmt->bindParam(":name",$this->cat);
         $stmt->bindParam(":id",$id );
        return $stmt->execute();
    }

}
