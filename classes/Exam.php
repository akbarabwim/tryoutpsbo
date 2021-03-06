<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{
  private $db;
  private $fm;
  public function __construct(){
      $this->db = new Database();
      $this->fm = new Format();
  }
  public function getQuesIndo(){
    $query = "SELECT * FROM tbl_ques WHERE mapel = '1' ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getQuesEnglish(){
    $query = "SELECT * FROM tbl_ques WHERE mapel = '2' ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getQuesMath(){
    $query = "SELECT * FROM tbl_ques WHERE mapel = '3' ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getQuesIPA(){
    $query = "SELECT * FROM tbl_ques WHERE mapel = '4' ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function addQuestions($data){
    $quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
    $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
    $mapel = mysqli_real_escape_string($this->db->link, $data['mapel']);
    $ans = array();
    $ans[1] = $data['ans1'];
    $ans[2] = $data['ans2'];
    $ans[3] = $data['ans3'];
    $ans[4] = $data['ans4'];
    $rightAns = $data['rightAns'];
    $query = "INSERT INTO tbl_ques(quesNo,ques,mapel) VALUES ('$quesNo','$ques', '$mapel')";
    $insert_row = $this->db->insert($query);
    if ($insert_row){
      foreach ($ans as $key => $ansName) {
        if ($ansName != '') {
          if ($rightAns == $key) {
            $rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans, mapel) VALUES('$quesNo', '1', '$ansName', '$mapel')";
          }
          else {
            $rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans, mapel) VALUES('$quesNo', '0', '$ansName', '$mapel')";
          }
          $insertrow = $this->db->insert($rquery);
          if ($insertrow) {
            continue;
          }
          else {
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Pertanyaan Berhasil Ditambahkan</span>";
    }
  }

  public function deleteQuestionIndo($quesNo){
    $tables = array("tbl_ques","tbl_ans");
    foreach ($tables as $table) {
      $delquery = "DELETE FROM $table WHERE quesNo='$quesNo' AND mapel='1'";
      $deldata = $this->db->delete($delquery);
    }
    if ($deldata) {
      $msg = "<span class = 'success'>Soal berhasil dihapus</span>";
      return $msg;
    }
    else {
      $msg = "<span class = 'success'>Terjadi Kesalahan</span>";
      return $msg;
    }
  }

  public function deleteQuestionEnglish($quesNo){
    $tables = array("tbl_ques","tbl_ans");
    foreach ($tables as $table) {
      $delquery = "DELETE FROM $table WHERE quesNo='$quesNo' AND mapel='2'";
      $deldata = $this->db->delete($delquery);
    }
    if ($deldata) {
      $msg = "<span class = 'success'>Soal berhasil dihapus</span>";
      return $msg;
    }
    else {
      $msg = "<span class = 'success'>Terjadi Kesalahan</span>";
      return $msg;
    }
  }

  public function deleteQuestionMath($quesNo){
    $tables = array("tbl_ques","tbl_ans");
    foreach ($tables as $table) {
      $delquery = "DELETE FROM $table WHERE quesNo='$quesNo' AND mapel='3'";
      $deldata = $this->db->delete($delquery);
    }
    if ($deldata) {
      $msg = "<span class = 'success'>Soal berhasil dihapus</span>";
      return $msg;
    }
    else {
      $msg = "<span class = 'success'>Terjadi Kesalahan</span>";
      return $msg;
    }
  }

  public function deleteQuestionIPA($quesNo){
    $tables = array("tbl_ques","tbl_ans");
    foreach ($tables as $table) {
      $delquery = "DELETE FROM $table WHERE quesNo='$quesNo' AND mapel='4'";
      $deldata = $this->db->delete($delquery);
    }
    if ($deldata) {
      $msg = "<span class = 'success'>Soal berhasil dihapus</span>";
      return $msg;
    }
    else {
      $msg = "<span class = 'success'>Terjadi Kesalahan</span>";
      return $msg;
    }
  }

  public function getTotalRows(){
    $query = "SELECT * FROM tbl_ques";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

  public function getTotalRowsIndo(){
    $query = "SELECT * FROM tbl_ques WHERE mapel='1'";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

  public function getTotalRowsEnglish(){
    $query = "SELECT * FROM tbl_ques WHERE mapel='2'";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

  public function getTotalRowsMath(){
    $query = "SELECT * FROM tbl_ques WHERE mapel='3'";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

  public function getTotalRowsIPA(){
    $query = "SELECT * FROM tbl_ques WHERE mapel='4'";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }
  public function getQuestionIndo(){
      $query = "SELECT * FROM tbl_ques WHERE mapel = '1'";
      $getdata = $this->db->select($query);
      $result = $getdata->fetch_assoc();
      return $result;
  }
  public function getQuestionEnglish(){
      $query = "SELECT * FROM tbl_ques WHERE mapel = '2'";
      $getdata = $this->db->select($query);
      $result = $getdata->fetch_assoc();
      return $result;
  }

  public function getQuestionMath(){
      $query = "SELECT * FROM tbl_ques WHERE mapel = '3'";
      $getdata = $this->db->select($query);
      $result = $getdata->fetch_assoc();
      return $result;
  }

  public function getQuestionIPA(){
      $query = "SELECT * FROM tbl_ques WHERE mapel = '4'";
      $getdata = $this->db->select($query);
      $result = $getdata->fetch_assoc();
      return $result;
  }

  public function getQuesByNumberIndo($number){
    $query = "SELECT * FROM tbl_ques WHERE (quesNo = '$number' AND mapel='1')";
    $getdata = $this->db->select($query);
    $result = $getdata->fetch_assoc();
    return $result;
  }

  public function getQuesByNumberEnglish($number){
    $query = "SELECT * FROM tbl_ques WHERE (quesNo = '$number' AND mapel='2')";
    $getdata = $this->db->select($query);
    $result = $getdata->fetch_assoc();
    return $result;
  }

  public function getQuesByNumberMath($number){
    $query = "SELECT * FROM tbl_ques WHERE (quesNo = '$number' AND mapel='3')";
    $getdata = $this->db->select($query);
    $result = $getdata->fetch_assoc();
    return $result;
  }

  public function getQuesByNumberIPA($number){
    $query = "SELECT * FROM tbl_ques WHERE (quesNo = '$number' AND mapel='4')";
    $getdata = $this->db->select($query);
    $result = $getdata->fetch_assoc();
    return $result;
  }

  public function getAnswerIndo($number){
    $query = "SELECT * FROM tbl_ans WHERE (quesNo = '$number' AND mapel='1')";
    $getdata = $this->db->select($query);
    return $getdata;
  }

  public function getAnswerEnglish($number){
    $query = "SELECT * FROM tbl_ans WHERE (quesNo = '$number' AND mapel ='2')";
    $getdata = $this->db->select($query);
    return $getdata;
  }

  public function getAnswerMath($number){
    $query = "SELECT * FROM tbl_ans WHERE (quesNo = '$number' AND mapel='3')";
    $getdata = $this->db->select($query);
    return $getdata;
  }

  public function getAnswerIPA($number){
    $query = "SELECT * FROM tbl_ans WHERE (quesNo = '$number' AND mapel='4')";
    $getdata = $this->db->select($query);
    return $getdata;
  }
  }
 ?>
