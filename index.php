<?php include 'inc/header.php'; ?>
<?php Session::checkLogin();
 ?>
<div class="main">
<h1>Try Out SMP Online</h1>

	<div class="segment">
	<form action="" method="post">
		<table class="tbl">
			 <tr>
			   <td>Username</td>
			   <td><input name="username" type="text" id="username"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password"></td>
			 </tr>

			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p><a href="register.php">Daftar Disini</a></p>
		 <span class="empty" style="display:none">Form tidak boleh kosong</span>
		 <span class="error" style="display:none">Username atau password anda salah!</span>
	</div>



</div>
<?php include 'inc/footer.php'; ?>
