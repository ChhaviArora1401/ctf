<?php 
session_start();
include('include/header.php');
include_once("include/db_connect.php");
?>
<script type="text/javascript" src="script/ajax.js"></script>
<?php
$cookie_name = "user";
$cookie_value = "4c6d89c97f38e4eb4c6bdbb9a381e87dd6977f2df49f4f16897dde7f";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
?>

<div class="container">
	<div class="collapse navbar-collapse" id="navbar1">	
		<ul class="nav navbar-nav navbar-left">
			<?php if (isset($_SESSION['user_id'])) { ?>
			<li><p class="navbar-text center"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
			<li><a href="logout.php">Log Out</a></li>
			<?php } else { ?>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Sign Up</a></li>
			<?php } ?>
		</ul>
	</div>
	<div id="hint-img">	
	<div class="hide-i">
		SWQ6IGJvc3NAdGVjaGRheS5jb20=
	</div>
	<div class="hide-p">
		cGFzczogdkBAQWxiJDUK
	</div>	
</div>			
</div>	
<?php include('include/footer.php');?>