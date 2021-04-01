<?php


class Copyrights extends Main{
    protected $table = "tbl_copyrights";
    private $copyright;



    public function setCopyright($copyright) {
        $this->copyright = $copyright;
    }



    public function Insert() {

    }

    public function update($id) {
        $query ="UPDATE ".$this->table." SET  copyrights = :copyrights WHERE id = :id ";
        $stmt =Database::prepare($query);
        $stmt->bindParam(":copyrights",$this->copyright);
        $stmt->bindParam(":id",$id );
        return $stmt->execute();
    }

}
