<?php

class Database {
	private $hostdb = "localhost";
	private $userdb = "root";
	private $passdb = "";
	private $namedb = "pdo_crud";
	private $pdo;

	public function __construct() {

		if(!isset($this->pdo)) {

			try {

				$link = new PDO("mysql:host=$this->hostdb; dbname=$this->namedb; charset=utf8", $this->userdb, $this->passdb);
				//connection string

				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$this->pdo = $link;

			} catch(PDOException $e) {

					die("connection failed ". $e->getMessage());
			}

	}
}


	//Read data

	public function select() {
		$query = $this->pdo->prepare("SELECT * FROM `students`");
		$query->execute();
		$studentList = $query->fetchAll(PDO::FETCH_ASSOC);
		return $studentList;
	}

	//Insert data

	public function insert() {
		extract($_POST);
		$query = $this->pdo->prepare("INSERT INTO `students`(`name`, `email`, `phone`) VALUES(:NM, :EM, :PASS);");
		$valToBind = Array (
				':NM' => $name,
				':EM' => $email,
				':PASS' => $phone
		);

		$query->execute($valToBind);
		$rowNumber = $query->rowCount();

		if($rowNumber>0) {
			 echo '<div class="alert alert-success">The student is registered Successfully !</div>' ;
		} else {
			echo '<div class="alert alert-danger">Sorry unable to save the student !</div>' ;
		}
	}

	//Update data

	public function getStudentById($sid) {
		$query = $this->pdo->prepare("SELECT * FROM `students` WHERE id=:SID");
		$query->bindValue(':SID', $sid, PDO::PARAM_INT );
		$query->execute();
		$studentList = $query->fetchAll(PDO::FETCH_ASSOC);
		return $studentList;
	}

	public function update() {
		extract($_POST);
		$query = $this->pdo->prepare("UPDATE `students` SET `name` =:NM, `email` =:EM, `phone` =:PH WHERE `id` =:SID");
		$valToBind = Array (
				':NM' =>$name,
				':EM' =>$email,
				':PH' =>$phone,
				':SID'=>$sid
		);
		$query->execute($valToBind);
		$rowNumber = $query->rowCount();

		if($rowNumber>0) {
			 echo '<div class="alert alert-success">The student is Updated Successfully !</div>' ;
		} else {
			echo '<div class="alert alert-danger">Sorry unable to update the student !</div>' ;
		}
	}


	//Delete data

	public function delete() {
		$query = $this->pdo->prepare("DELETE FROM `students` WHERE id = :SID;");
		$query->bindValue(':SID', $_GET['id'], PDO::PARAM_INT );
		$query->execute();
		$rowNumber = $query->rowCount();

		if($rowNumber>0) {
			 echo '<div class="alert alert-success">The student is Deleted Successfully !</div>' ;
		} else {
			echo '<div class="alert alert-danger">Sorry unable to Delete the student !</div>' ;
		}
	}

}
 ?>
