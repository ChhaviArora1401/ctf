<?php 
session_start();
include('include/header.php');
include_once("include/db_connect.php");

if(isset($_SESSION['user_id'])!="") {
	header("Location: index.php");
}
if (isset($_POST['login'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);
	
	$stmt = $connect->prepare("
		SELECT uid, user 
		FROM users 
		WHERE email = ? AND pass = ? ");
	
	$stmt->bind_param("ss", $email, $password);
	
	$stmt->execute();
	
	$result = $stmt->get_result();
	
	if($result->num_rows){
		while($user = $result->fetch_assoc())  {
			$_SESSION['user_id'] = $user['uid'];
			$_SESSION['user_name'] = $user['user'];		
			header("Location: index.php");
		} 
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>
<title>Login and Registration System with PHP, MySQL</title>
<script type="text/javascript" src="script/ajax.js"></script>
<?php include('include/container.php');?>

<div class="container">		
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>						
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>	
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		New User? <a href="register.php">Sign Up Here</a>
		</div>
	</div>	
	
</div>
<?php include('include/footer.php');?> 