<?php include 'inc/header.php'; ?>
<?php Session::checkSession();
 ?>
<div class="main">
<h1>Welcome to Online Exam - Start Now</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/online_exam.png"/>
	</div>
	<div class="segment">
	<h2>Silahkan Pilih Mata Pelajaran</h2>
	<ul>
		<li><a href="starttest1.php">Bahasa Indonesia</a></li>
    <li><a href="starttest2.php">Bahasa Inggris</a></li>
    <li><a href="starttest3.php">Matematika</a></li>
    <li><a href="starttest4.php">IPA</a></li>
	</ul>
	</div>

  </div>
<?php include 'inc/footer.php'; ?>
