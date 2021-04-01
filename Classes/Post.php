<?php


class Post extends Main{
    protected $table ="tbl_post";
    private $title;
    private $cat;
    private $image;
    private $body;
    private $tags;
    private $author;
    private $file;

    /**
     * Post constructor.
     * @param $data
     * @internal param string $table
     */
    public function __construct($data){
        if (isset($data)){
            $this->title  = $data['title'];
            $this->cat    = $data['cat'];
            $this->body   = $data['body'];
            $this->tags   = $data['tags'];
            $this->author = $data['author'];
        }
    }

    /**
     * @param mixed $image
     */
    public function setImage($file){
        $this->file = $file;
    }

    /**
     *Insert
     */
    public function Insert() {
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $this->file['image']['name'];
        $file_size = $this->file['image']['size'];
        $file_temp = $this->file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if (empty( $this->title)){
            echo "<p class='bg-danger big'>Title must not be empty</p>";
        }elseif (empty($this->cat)){
            echo "<p class='bg-danger big'>Catagory must not be empty</p>";
        }elseif (empty($this->body)){
            echo "<p class='bg-danger big'>Text must not be empty</p>";
        }elseif (empty($this->tags)){
            echo "<p class='bg-danger big'>Tags must not be empty</p>";
        }elseif (empty($this->author)){
            echo  "<p class='bg-danger big'>Tags must not be empty</p>";
        }elseif ($file_size >1048567) {
            echo "<p class='bg-danger big'>Image Size should be less then 1MB!</p>";

        } elseif (in_array($file_ext, $permited) === false) {
            echo "<p class='bg-danger big'>You can upload only:-".implode(', ', $permited)."</p>";

        } else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query ="INSERT INTO ".$this->table." (title, cat, image, body, tags, author)  VALUES (:title, :cat, :image, :body, :tags, :author) ";
            $stmt =Database::prepare($query);
            $stmt->bindParam(":title",$this->title );
            $stmt->bindParam(":cat",$this->cat );
            $stmt->bindParam(":image",$uploaded_image );
            $stmt->bindParam(":body",$this->body );
            $stmt->bindParam(":tags",$this->tags );
            $stmt->bindParam(":author",$this->author );
            return $stmt->execute();
        }
    }

    public function update($id) {
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $this->file['image']['name'];
        $file_size = $this->file['image']['size'];
        $file_temp = $this->file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if (empty( $this->title)){
            echo "<p class='bg-danger big'>Title must not be empty</p>";
        }elseif (empty($this->cat)){
            echo "<p class='bg-danger big'>Catagory must not be empty</p>";
        }elseif (empty($this->body)){
            echo "<p class='bg-danger big'>Text must not be empty</p>";
        }elseif (empty($this->tags)){
            echo "<p class='bg-danger big'>Tags must not be empty</p>";
        }elseif (empty($this->author)){
            echo  "<p class='bg-danger big'>Tags must not be empty</p>";
        }else{
            if (!empty($file_name)){

                if ($file_size >1048567) {
                    echo "<p class='bg-danger big'>Image Size should be less then 1MB!</p>";

                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<p class='bg-danger big'>You can upload only:-".implode(', ', $permited)."</p>";
                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query ="UPDATE ".$this->table." SET title = :title, cat =:cat, image =:image, body =:body, tags =:tags, author =:author WHERE id =:id ";
                    $stmt =Database::prepare($query);
                    $stmt->bindParam(":title",$this->title );
                    $stmt->bindParam(":cat",$this->cat );
                    $stmt->bindParam(":image",$uploaded_image );
                    $stmt->bindParam(":body",$this->body );
                    $stmt->bindParam(":tags",$this->tags );
                    $stmt->bindParam(":author",$this->author );
                    $stmt->bindParam(":id",$id );
                    return $stmt->execute();
                }

            }else{
                $query ="UPDATE ".$this->table." SET title = :title, cat =:cat,  body =:body, tags =:tags, author =:author WHERE id =:id ";
                $stmt =Database::prepare($query);
                $stmt->bindParam(":title",$this->title );
                $stmt->bindParam(":cat",$this->cat );
                $stmt->bindParam(":body",$this->body );
                $stmt->bindParam(":tags",$this->tags );
                $stmt->bindParam(":author",$this->author );
                $stmt->bindParam(":id",$id );
                return $stmt->execute();
            }
        }
    }




    /**
     * @Override method
     */
    public function readAllData(){
        $sql ="SELECT tbl_post.*,tbl_catagory.name FROM tbl_post INNER JOIN tbl_catagory ON tbl_post.cat =tbl_catagory.id ORDER BY tbl_post.id DESC";
        $stmt =Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function readALLFor($start_page,$per_page){
        $sql ="SELECT * FROM ".$this->table." ORDER BY id DESC LIMIT $start_page,$per_page";
        $stmt =Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function CountRow(){
        $sql  = "SELECT COUNT(*) as totalRow  FROM tbl_post";
        $stmt =Database::prepare($sql);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalRow'];
    }

    public function readCat($cat){
        $sql ="SELECT * FROM ".$this->table." WHERE cat =:cat order by rand() LIMIT 6";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":cat",$cat);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function readCatLimite($cat,$start_page,$per_page){
        $sql ="SELECT * FROM ".$this->table." WHERE cat =:cat ORDER BY id DESC LIMIT $start_page,$per_page";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":cat",$cat);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function CatCountRow($cat){
        $sql  = "SELECT COUNT(*) as totalRow  FROM ".$this->table." WHERE cat =:cat";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":cat",$cat);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalRow'];
    }

    public function searchPost($search,$start_page,$per_page){
        $sql ="SELECT * FROM tbl_post WHERE title LIKE :search or body LIKE :search ORDER BY id DESC LIMIT $start_page,$per_page";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":search",$search);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function readAllLIme() {
        $sql ="SELECT * FROM ".$this->table." ORDER BY id DESC LIMIT 5";
        $stmt =Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function SearchCountRow($search){
        $sql  = "SELECT COUNT(*) as totalRow  FROM ".$this->table." WHERE title LIKE :search or body LIKE :search";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":search",$search);
        $stmt->execute();
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalRow'];
    }
}
