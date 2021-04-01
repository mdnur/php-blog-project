<?php

include_once 'Main.php';

$db = new Database();
class Student extends Main{
    protected  $table ="tbl_student";
	private $name;
	private $department;
	private $age;

	
	public function setName($name){
		$this->name =$name;
	}
	
	public function setDepartment($department){
		$this->department =$department;
	}
	
	public function setAge($age){
		$this->age =$age;
	}
	
	public function Insert() {
		$sql ="INSERT INTO ".$this->table."(name, department , age) VALUES (:name,:department,:age)";
		$stmt =Database::prepare($sql);
		$stmt->bindParam(":name",$this->name );
		$stmt->bindParam(":department", $this->department);
		$stmt->bindParam(":age", $this->age);
		return  $stmt->execute();
	}
	
	public function update($id) {
		$sql ="UPDATE ".$this->table." SET name=:name, department =:department,age =:age WHERE id=:id";
		$stmt =Database::prepare($sql);
		$stmt->bindParam(":id",$id );
		$stmt->bindParam(":name",$this->name );
		$stmt->bindParam(":department", $this->department);
		$stmt->bindParam(":age", $this->age);
		return $stmt->execute();
	}
	


}
