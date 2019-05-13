<?php include 'inc/header.php'; ?>
<?php Session::checkLogin();
 ?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
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
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
		 <span class="empty" style="display:none">Form tidak boleh kosong</span>
		 <span class="error" style="display:none">Username atau password anda salah!</span>
	</div>



</div>
<?php include 'inc/footer.php'; ?>
