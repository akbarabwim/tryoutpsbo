<?php include 'inc/header.php'; ?>
<?php Session::checkSession();
      $question = $exm->getQuestionMath();
      $total = $exm->getTotalRowsMath();
 ?>
<div class="main">
<h1>Selamat Datang di Try Out Online</h1>
	<div class="starttest">
	<h2>Selamat Mencoba</h2>
  <p>Try Out ini bertujuan untuk mengasah kemampuan anda</p>
  <ul>
    <li><strong>Jumlah Soal :</strong> <?php echo $total;?></li>
    <li><strong>Bentuk Soal :</strong> Pilihan Ganda</li>
  </ul>
  <a href="test3.php?q=<?php echo $question['quesNo']?>">Mulai Try Out</a>
	</div>

  </div>
<?php include 'inc/footer.php'; ?>
