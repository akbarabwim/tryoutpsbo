<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class User{
  private $db;
  private $fm;
  public function __construct(){
      $this->db = new Database();
      $this->fm = new Format();
  }
  public function userRegistration($name, $username, $password, $email){
    $name = $this->fm->validation($name);
    $username = $this->fm->validation($username);
    $password = $this->fm->validation($password);
    $email = $this->fm->validation($email);

    $name = mysqli_real_escape_string($this->db->link, $name);
    $username = mysqli_real_escape_string($this->db->link, $username);
    $password = mysqli_real_escape_string($this->db->link, md5($password));
    $email = mysqli_real_escape_string($this->db->link, $email);

    if ($name == ""|| $username == ""|| $password == "" || $email == ""){
      echo "<span class='error'> Form Tidak Boleh Kosong</span>";
      exit();
    }else if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
      echo "<span class='error'>Email Tidak Valid</span>";
      exit();
    }else {
      $chkquery = "SELECT * FROM tbl_user WHERE email='$email'";
      $chkresult = $this->db->select($chkquery);
      if ($chkresult != false) {
        echo "<span class='error'>Email Sudah Terpakai</span>";
        exit();
      }else {
        $query = "INSERT INTO tbl_user(name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";
        $inserted_row = $this->db->insert($query);
        if ($inserted_row) {
          echo "<span class = 'success'>Regitrasi Berhasil</span>";
          exit();
        }else {
          echo "<span class = 'error'>Registrasi Gagal</span>";
          exit();
        }
      }
    }
  }
  public function userLogin($username, $password){
    $username = $this->fm->validation($username);
    $password = $this->fm->validation($password);

    $username = mysqli_real_escape_string($this->db->link, $username);
    $password = mysqli_real_escape_string($this->db->link, $password);

    if ($username == "" || $password == "") {
      echo "empty";
      exit();
    }
    else{
      $query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
      $result = $this->db->select($query);
      if ($result != false) {
        $value = $result->fetch_assoc();
        Session::init();
        Session::set("login", true);
        Session::set("userid", $value['userid']);
        Session::set("email", $value['email']);
        Session::set("name", $value['name']);
      }
      else{
        echo "error";
        exit();
      }
    }
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
