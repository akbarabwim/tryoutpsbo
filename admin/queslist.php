<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<div class="main">
  <h1>List Pertanyaan</h1>
      <div class="segment">
        <h2>Silakan Pilih Mata Pelajaran</h2>
        <ul>
          <li><a href="queslist1.php">Bahasa Indonesia</a></li>
          <li><a href="queslist2.php">Bahasa Inggris</a></li>
          <li><a href="queslist3.php">Matematika</a></li>
          <li><a href="queslist4.php">IPA</a></li>
        </ul>
      </div>
</div>
<?php include 'inc/footer.php'; ?>
