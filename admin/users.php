<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
  $usr = new User();
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
  <h1>Atur Pengguna</h1>
  <?php if (isset($delUser)) {
    echo $delUser;
  } ?>
      <div class="manageuser">
          <table class="tblone">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
<?php
      $userData = $usr->getAllUser();
      if($userData){
        $i=0;
        while ($result = $userData->fetch_assoc()) {
          $i++;
 ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $result['name'];?></td>
              <td><?php echo $result['username'];?></td>
              <td><?php echo $result['email'];?></td>
              <td>
                <?php
                  //  if ($result['status']=='0') {?>
              <!--  <a onclick="return confirm('Apakah anda yakin?')" href="?dis=<?php //echo $result['userid']; ?>">Disable</a>
              <?php //}else{ ?>
                <a onclick="return confirm('Apakah anda yakin?')" href="?dis=<?php// echo $result['userid']; ?>">Enable</a>-->
              <?php //} ?>
                <a onclick="return confirm('Apakah anda yakin?')" href="?del=<?php echo $result['userid']; ?>">Hapus</a>
              </td>
            </tr>
<?php  }
      } ?>
          </table>
      </div>
</div>
<?php include 'inc/footer.php'; ?>