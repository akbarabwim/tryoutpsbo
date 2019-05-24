<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>
<style>
.adminpanel{width: 500px;color: #999;margin: 30px auto 0; padding: 50px;border-radius: :1px solid
#ddd;}
</style>
<div class="main">
<h1>Admin Panel</h1>
    <div class="adminpanel">
          <h2>Selamat datang, Admin</h2>
          <p>Anda damat mengatur user dan sistem disini.</p>
    </div>



</div>
<?php include 'inc/footer.php'; ?>
