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
  public function getQuesMath(){
    $query = "SELECT * FROM tbl_ques WHERE mapel = '3'ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
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
  }
 ?>
