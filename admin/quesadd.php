<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
  include_once ($filepath.'/../classes/Exam.php');
  $exm = new Exam();
?>
<?php
  // Session::checkLogin();
?>
<style>
.adminpanel{width: 500px;color: #999;margin: 30px auto 0; padding: 50px;border-radius: :1px solid
#ddd;}
</style>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $addQue = $exm->addQuestions($_POST);
}
$total = $exm->getTotalRows();
$next = $total+1;
?>
<div class="main">
<h1>Tambahkan Pertanyaan</h1>
<?php
  if (isset($addQue)) {
    echo $addQue;
  }
 ?>
    <div class="adminpanel">
      <form action="" method="post">
        <table>
          <tr>
            <td>Mata Pelajaran</td>
            <td>:</td>
            <td><select name="mapel">
              <option value="1">Bahasa Indonesia</option>
              <option value="2">Bahasa Inggris</option>
              <option value="3">Matematika</option>
              <option value="4">IPA</option>
            </select></td>
          </tr>
          <tr>
            <td>No. Pertanyaan</td>
            <td>:</td>
            <td><input type="number" name="quesNo"/></td>
          </tr>
          <tr>
            <td>Pertanyaan</td>
            <td>:</td>
            <td><input type="text" name="ques" placeholder="Silakan Masukkan Pertanyaan"/></td>
          </tr>
          <tr>
            <td>Pilihan A</td>
            <td>:</td>
            <td><input type="text" name="ans1" placeholder="Silakan Masukkan Pilihan A"/required></td>
          </tr>
          <tr>
            <td>Pilihan B</td>
            <td>:</td>
            <td><input type="text" name="ans2" placeholder="Silakan Masukkan Pilihan B"/required></td>
          </tr>
          <tr>
            <td>Pilihan C</td>
            <td>:</td>
            <td><input type="text" name="ans3" placeholder="Silakan Masukkan Pilihan C"/required></td>
          </tr>
          <tr>
            <td>Pilihan D</td>
            <td>:</td>
            <td><input type="text" name="ans4" placeholder="Silakan Masukkan Pilihan D"/required></td>
          </tr>
          <tr>
            <td>Jawaban</td>
            <td>:</td>
            <td><input type="number" name="rightAns" /required></td>
          </tr>
          <tr>
            <td colspan="3">
              <input align='center' type="submit" value="Tambahkan Pertanyaan"/>
            </td>
          </tr>
        </table>
      </form>
    </div>



</div>
<?php include 'inc/footer.php'; ?>
