<?php include 'inc/header.php'; ?>
<?php Session::checkSession();
 ?>
<div class="main">
<h1>Tes Selesai!</h1>
  <div class="starttest">
    <p>Selamat! Anda telah menyelesaikan tes ini</p>
    <p>Nilai Anda :
        <?php
          if (isset($_SESSION['score'])) {
            echo $_SESSION['score'];
            unset($_SESSION['score']);
          }
         ?>
    </p>

    <a href="viewans2.php">Lihat Jawaban</a>
    <a href="starttest2.php">Mulai Lagi</a>
  </div>
  </div>
<?php include 'inc/footer.php'; ?>
