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

  public function deleteQuestion($quesNo){
    $tables = array("tbl_ques","tbl_ans");
    foreach ($tables as $table) {
      $delquery = "DELETE FROM $table WHERE quesNo='$quesNo'";
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

  public function getQuestion(){
      $query = "SELECT * FROM tbl_ques";
      $getdata = $this->db->select($query);
      $result = $getdata->fetch_assoc();
      return $result;
  }

  public function getQuesByNumber($number){
    $query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
    $getdata = $this->db->select($query);
    $result = $getdata->fetch_assoc();
    return $result;
  }

  public function getAnswer($number){
    $query = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
    $getdata = $this->db->select($query);
    return $getdata;
  }
  }
 ?>
