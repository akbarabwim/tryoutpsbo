<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Try Out SMP Online- User Registration</h1>
	<div class="segment">
	<form action="" method="post">
		<table>
		<tr>
           <td>Nama</td>
           <td><input type="text" name="name" id="name"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="username" type="text" id="username"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password" id="password"></td>
         </tr>

         <tr>
           <td>E-mail</td>
           <td><input name="email" type="text" id="email"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" id="regsubmit" value="Signup">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Sudah Terdaftar?<a href="index.php">Login Disini</a></p>
		 <span id="state"></span>
	</div>



</div>
<?php include 'inc/footer.php'; ?>
