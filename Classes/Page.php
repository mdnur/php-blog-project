<?php


class Page extends Main{
    protected $table ="tbl_page";
    private $title;
    private $body;


    /**
     * @param mixed $title
     */
    public function setTitle($title){
        $this->title = $title;
    }

    public function setbody($body){
        $this->body =$body;
    }

    public function Insert() {
        if(empty($this->title)){
            echo "<p class='bg-danger big'>Title must not be empty</p>";
        }elseif (empty($this->body)){
            echo "<p class='bg-danger big'>body must not be empty</p>";
        }else{
            $query ="INSERT INTO ".$this->table." (title,body) VALUES (:title,:body)";
            $stmt =Database::prepare($query);
            $stmt->bindParam(":title",$this->title );
            $stmt->bindParam(":body",$this->body );
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

}
