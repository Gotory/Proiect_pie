<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">SayHi</h3>
        <nav class="nav nav-masthead">
            <a class="nav-link <?php print($checkHome);?>" href="BackPagina01.php">Home<?php ?></a>
            <a class="nav-link <?php print($checkAbout);?>" href="BackPagina02.php">About</a>
            <a class="nav-link <?php print($checkContact);?>" href="BackPagina03.php">Contact</a>
            <?php
            if(isset($_SESSION['login'])){
                print("<a class=\"nav-link\" href=\"BackPagina01.php\">Log out</a>");
            }
            ?>
        </nav>
    </div>
</div>