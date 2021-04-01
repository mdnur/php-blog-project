<?php



class Title extends Main{
    protected $table = "tbl_title";
    private $title;
    private $describtion;
    private $logo;


    public function setTitle($title){
        $this->title = $title;
    }


    public function setDescribtion($describtion){
        $this->describtion = $describtion;
    }


    public function setLogo($logo){
        $this->logo = $logo;
    }



    public function Insert() {

    }

    public function update($id) {
        $permited  = array('png');
        $file_name = $this->logo['logo']['name'];
        $file_size = $this->logo['logo']['size'];
        $file_temp = $this->logo['logo']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $same_name = "logo".'.'.$file_ext;
        $uploaded_image = "uploads/".$same_name;

        if (empty($this->title)){
            echo "<p class='bg-danger big'>Title must not be empty</p>";
        }elseif (empty($this->describtion)){
            echo "<p class='bg-danger big'>describtion must not be empty</p>";
        }else{
            if(!empty($file_name)){
                if ($file_size >1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB!</span>";

                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";

                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query ="UPDATE ".$this->table." SET  title = :title,describtion = :describtion, logo = :logo  WHERE id = :id ";
                    $stmt =Database::prepare($query);
                    $stmt->bindParam(":title",$this->title);
                    $stmt->bindParam(":describtion",$this->describtion);
                    $stmt->bindParam(":logo",$uploaded_image);
                    $stmt->bindParam(":id",$id );
                    return $stmt->execute();
                }
            }else{
                $query ="UPDATE ".$this->table." SET  title = :title,describtion = :describtion  WHERE id = :id ";
                $stmt =Database::prepare($query);
                $stmt->bindParam(":title",$this->title);
                $stmt->bindParam(":describtion",$this->describtion);
                $stmt->bindParam(":id",$id );
                return $stmt->execute();
            }
        }

    }

}
