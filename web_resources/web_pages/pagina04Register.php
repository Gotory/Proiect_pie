<?php
include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');
#-------------------------------------------------------------------- 1.0 START-Logarea utilizatorului inregistrat/neinregistrat pe site
//$log4Debug =Log4DebugFactory::getLog4DebugObject();
//$log4Debug->logingVisitorActiviti(OS_USER_INFO::get_client_ip());
#-------------------------------------------------------------------- 1.0 END-Logarea utilizatorului inregistrat/neinregistrat pe site
session_start();
?>
<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">register</div>
	<!-- Main Form -->
	  <div class="row" style="display:<?php if(!isset($_SESSION['exceptie'])){print("none");}?>;">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <?php
                        if(isset($_SESSION['exceptie'])){print_r($_SESSION['exceptie']->getMessage());}
                        unset($_SESSION['exceptie']);
                    ?>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
	<div class="login-form-1">
		<form id="register-form" class="text-left" action="../../BE_development/PHP/FlowDecisions/flow04Register.php">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="reg_username" class="sr-only">Email address</label>
						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="nickname" required>
					</div>
					<div class="form-group">
						<label for="reg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password" required>
					</div>
					<div class="form-group">
						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password" required>
					</div>

					<div class="form-group">
						<label for="reg_email" class="sr-only">Email</label>
						<input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email" required>
					</div>
					<div class="form-group">
						<label for="reg_fullname" class="sr-only">Full Name</label>
						<input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="full name" required>
					</div>

					<div class="form-group login-group-checkbox">
						<input type="radio" class="" name="reg_gender" id="male" placeholder="username" value="M">
						<label for="male">male</label>

						<input type="radio" class="" name="reg_gender" id="female" placeholder="username"  value="F">
						<label for="female">female</label>
					</div>

					<div class="form-group login-group-checkbox">
						<input type="checkbox" class="" id="reg_agree" name="reg_agree">
						<label for="reg_agree">i agree with <a href="#">terms</a></label>
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="BackPagina01.php">login here</a></p>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>