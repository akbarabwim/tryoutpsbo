<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
//Session::init();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Process{
private $db;
private $fm;
public function __construct(){
	$this->db= new Database();
	$this->fm= new Format();
}

public function processDataIndo($data){
	$selectedAns = $this->fm->validation($data['ans']);
	$number = $this->fm->validation($data['number']);
	$selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
	$number = mysqli_real_escape_string($this->db->link, $number);
	$next = $number+1;

	if (!isset($_SESSION['score'])) {
		$_SESSION['score'] = '0';
	}
	$total = $this->getTotalIndo();
	$right = $this->rightAnsIndo($number);
	if ($right == $selectedAns) {
		$_SESSION['score']++;
	}
	if ($number == $total) {
		header("Location: final1.php");
		exit();
	}
	else {
		header("Location: test1.php?q=".$next);
	}
}

public function processDataEnglish($data){
	$selectedAns = $this->fm->validation($data['ans']);
	$number = $this->fm->validation($data['number']);
	$selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
	$number = mysqli_real_escape_string($this->db->link, $number);
	$next = $number+1;

	if (!isset($_SESSION['score'])) {
		$_SESSION['score'] = '0';
	}
	$total = $this->getTotalEnglish();
	$right = $this->rightAnsEnglish($number);
	if ($right == $selectedAns) {
		$_SESSION['score']++;
	}
	if ($number == $total) {
		header("Location: final2.php");
		exit();
	}
	else {
		header("Location: test2.php?q=".$next);
	}
}

public function processDataMath($data){
	$selectedAns = $this->fm->validation($data['ans']);
	$number = $this->fm->validation($data['number']);
	$selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
	$number = mysqli_real_escape_string($this->db->link, $number);
	$next = $number+1;

	if (!isset($_SESSION['score'])) {
		$_SESSION['score'] = '0';
	}
	$total = $this->getTotalMath();
	$right = $this->rightAnsMath($number);
	if ($right == $selectedAns) {
		$_SESSION['score']++;
	}
	if ($number == $total) {
		header("Location: final3.php");
		exit();
	}
	else {
		header("Location: test3.php?q=".$next);
	}
}

public function processDataIPA($data){
	$selectedAns = $this->fm->validation($data['ans']);
	$number = $this->fm->validation($data['number']);
	$selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
	$number = mysqli_real_escape_string($this->db->link, $number);
	$next = $number+1;

	if (!isset($_SESSION['score'])) {
		$_SESSION['score'] = '0';
	}
	$total = $this->getTotalIPA();
	$right = $this->rightAnsIPA($number);
	if ($right == $selectedAns) {
		$_SESSION['score']++;
	}
	if ($number == $total) {
		header("Location: final4.php");
		exit();
	}
	else {
		header("Location: test4.php?q=".$next);
	}
}


private function getTotalIndo(){
	$query = "SELECT * FROM tbl_ques WHERE mapel = '1'";
	$getResult = $this->db->select($query);
	$total = $getResult->num_rows;
	return $total;
}

private function getTotalEnglish(){
	$query = "SELECT * FROM tbl_ques WHERE mapel = '2'";
	$getResult = $this->db->select($query);
	$total = $getResult->num_rows;
	return $total;
}

private function getTotalMath(){
	$query = "SELECT * FROM tbl_ques WHERE mapel = '3'";
	$getResult = $this->db->select($query);
	$total = $getResult->num_rows;
	return $total;
}

private function getTotalIPA(){
	$query = "SELECT * FROM tbl_ques WHERE mapel = '4'";
	$getResult = $this->db->select($query);
	$total = $getResult->num_rows;
	return $total;
}

private function rightAnsIndo($number){
	$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1' AND mapel='1'";
	$getdata = $this->db->select($query)->fetch_assoc();
	$result = $getdata['id'];
	return $result;
}

private function rightAnsEnglish($number){
	$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1' AND mapel='2'";
	$getdata = $this->db->select($query)->fetch_assoc();
	$result = $getdata['id'];
	return $result;
}

private function rightAnsMath($number){
	$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1' AND mapel='3'";
	$getdata = $this->db->select($query)->fetch_assoc();
	$result = $getdata['id'];
	return $result;
}

private function rightAnsIPA($number){
	$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1' AND mapel='4'";
	$getdata = $this->db->select($query)->fetch_assoc();
	$result = $getdata['id'];
	return $result;
}
}
 ?>
