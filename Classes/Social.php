<?php


class Social extends Main{
    protected $table = "tbl_social";
    private $fb;
    private $tw;
    private $inst;
    private $gp;



    public function setFB($fb) {
        $this->fb = $fb;
    }

    public function setTW($tw) {
        $this->tw = $tw;
    }
    public function setINST($inst) {
        $this->inst = $inst;
    }
    public function setGP($gp) {
        $this->gp = $gp;
    }

    public function Insert() {

    }

    public function update($id) {
        $query ="UPDATE ".$this->table." SET  fb = :fb,tw = :tw, inst = :inst,gp = :gp WHERE id = :id ";
        $stmt =Database::prepare($query);
        $stmt->bindParam(":fb",$this->fb);
        $stmt->bindParam(":tw",$this->tw);
        $stmt->bindParam(":inst",$this->inst);
        $stmt->bindParam(":gp",$this->gp);
        $stmt->bindParam(":id",$id );
        return $stmt->execute();
    }

}
