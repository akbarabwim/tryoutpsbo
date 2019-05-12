<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$userid= Session::get("userid");
?>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$updateUser= $usr->updateUserData($userid,$_POST);
}

?>
<style>
.profile{
	border:1px solid #ddd;
	margin: 0 auto;
	padding: 30px 50px 50px 138px;
	width:440px;
	}
</style>
//try fetch one row di db
<div class="main">
<h1>Profile Kamu</h1>
	<div class="profile">
			<?php if(isset($updateUser)){
				echo $updateUser;


			}

			?>

			?>

	<form action="" method="post">
		<?php
			$getData = $usr->getUserData($userid);
			if($getData){
				//fetch in one row
			$result=$getData->fetch_assoc();
		 ?>

		 //get data dr db
		<table class="tbl">
			<tr>
				<td>Name</td>
				<td><input name="name" type="text" id="name" value="<?php echo $result['name'];
				?>" ></td>
			</tr>
			<tr>
				<td>Username </td>
				<td><input name="username" type="text" id="username"<?php echo $result['username'];
				?>"></td>
			</tr>
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" id="email" <?php echo $result['email'];
 				?>" ></td>
			 </tr>


			  <tr>
			  <td></td>
			   <td><input type="submit"  value="Update">
			   </td>
			 </tr>
       </table>
<?php } ?>
	   </form>
</div> </div>
<?php include 'inc/footer.php'; ?>
