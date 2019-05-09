//copy ke header.php di inc
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::init();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

spl_autoload_register(function($class){
	include_once “classes/“.$class.”.php”;
});

$db = new Database();
$fm = new Format();
$usr = new User();
$exm = new Exam();
$pro= new Process();
//sampai sini

//lalu buat file Process.php di exam/classes




<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class User{
  private $db;
  private $fm;
  public function __construct(){
      $this->db = new Database();
      $this->fm = new Format();
  }
  public function getAdminData($data){
    $adminUser = $this->fm->validation($data['adminUser']);
    $adminPass = $this->fm->validation($data['adminPass']);
    $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));

  }
  public function getAllUser(){
    $query = "SELECT * FROM tbl_user";
    $result = $this->db->select($query);
    return $result;
  }

  public function deleteUser($userid){
    $query = "DELETE FROM tbl_user WHERE userid = '$userid'";
    $deldata = $this->db->delete($query);
    if ($deldata) {
      $msg = "<span class = 'success'>Username berhasil dihapus</span>";
      return $msg;
    }
    else {
      $msg = "<span class = 'success'>Terjadi Kesalahan</span>";
      return $msg;
    }
  }
}
 ?>
