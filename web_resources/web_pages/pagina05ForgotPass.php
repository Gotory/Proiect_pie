<!-- FORGOT PASSWORD FORM -->
<?php
session_start();
?>
<div class="text-center" style="padding:50px 0">
    <div class="logo">forgot password</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="forgot-password-form" class="text-left"  action="../../BE_development/PHP/FlowDecisions/flow05ForgotPass.php">
            <div class="etc-login-form">
                <p>Dupa ce vei completa input-ul de email vei primi pe mail instructiuni de recuperare a parolei.</p>
            </div>

            <div class="row" style="display:<?php if(!isset($_SESSION['exceptie'])){print("none");}?>;">

                <div class="col-sm-12" STYLE="text-align: center;">
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

            </div>

            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="fp_email" class="sr-only">Email address</label>
                        <input type="text" class="form-control" id="fp_email" name="fp_email" placeholder="email address">
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>already have an account? <a href="BackPagina01.php">login here</a></p>
                <p>new user? <a href="BackPagina04.php">create new account</a></p>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>