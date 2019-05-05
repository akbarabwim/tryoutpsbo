<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
  $exm = new Exam();
?>
<?php
/*  if (isset($_GET['dis'])) {
    $dblid = (int)$_GET['dis'];
    $dblUser = $usr->DisableUser($dblid);
  }*/
  if (isset($_GET['del'])) {
      $delid = (int)$_GET['del'];
      $delUser = $usr->deleteUser($delid);
    }
 ?>
<div class="main">
  <h1>List Pertanyaan</h1>
      <div class="quelist">
          <table class="tblone">
            <tr>
              <th width = "10%">No.</th>
              <th width = "70%">Pertanyaan</th>
              <th width = "20%">Action</th>
            </tr>
<?php
      $getData = $exm->getQues();
      if($getData){
        $i=0;
        while ($result = $getData->fetch_assoc()) {
          $i++;
 ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $result['ques']; ?></td>
              <td>
                <a onclick="return confirm('Apakah anda yakin?')" href="?del=<?php //echo $result['userid']; ?>">Hapus</a>
              </td>
            </tr>
<?php  }
      } ?>
          </table>
      </div>
</div>
<?php include 'inc/footer.php'; ?>
