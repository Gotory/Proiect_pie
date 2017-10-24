<?php

include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');

$log4Debug = new Log4Debug();
$log4Debug->logingVisitorActiviti(OS_USER_INFO::get_client_ip());
?>
<!-- Introducerea form-ului -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">login</div>
	<!-- Main Form -->
	  <div class="login-form-1">
		<form id="login-form" class="text-left" action="../../BE_development/PHP/FlowDecisions/pagina01Login.php" METHOD="POST">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="tmp_username" placeholder="username">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="tmp_password" placeholder="password">
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
<!-- end:Main Form -->
