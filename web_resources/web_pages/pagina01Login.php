<?php
include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');
#-------------------------------------------------------------------- 1.0 START-Logarea utilizatorului inregistrat/neinregistrat pe site
$log4Debug =Log4DebugFactory::getLog4DebugObject();
$log4Debug->logingVisitorActiviti(OS_USER_INFO::get_client_ip());
#-------------------------------------------------------------------- 1.0 END-Logarea utilizatorului inregistrat/neinregistrat pe site
session_start();
?>
<!-- Introducerea form-ului -->
<div class="text-center" style="padding:50px 0">

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="logo">login</div>
            <!-- Main Form -->
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row" style="display:<?php if(!isset($_SESSION['exceptie'])){print("none");}?>;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <?php
                    if(isset($_SESSION['exceptie'])){
                        print_r($_SESSION['exceptie']->getMessage());
                    }
                    unset($_SESSION['exceptie']);
                ?>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
	  <div class="login-form-1">
		<form id="login-form" class="text-left" action="../../BE_development/PHP/FlowDecisions/flow01Login.php" METHOD="POST" >
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="tmp_username" placeholder="username or email" required>
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="tmp_password" placeholder="password" required>
					</div>
					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="tmp_remember">
						<label for="lg_remember">remember</label>
					</div>
				</div>
				<button type="submit" class="login-button">
				        <i class="fa fa-chevron-right"></i>
				</button>
			</div>
			<div class="etc-login-form">
				<p>forgot your password? <a href="BackPagina05.php">click here</a></p>
				<p>new user? <a href="BackPagina04.php">create new account</a></p>
			</div>
		</form>
      </div>
    </div>
    <div class="col-sm-3"></div>
</div>
</div>
<!-- end:Main Form -->