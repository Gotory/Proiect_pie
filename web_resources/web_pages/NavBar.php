<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">SayHi</h3>
        <nav class="nav nav-masthead">
            <a class="nav-link active" href="BackPagina01.php">Home<?php ?></a>
            <a class="nav-link" href="BackPagina02.php">About</a>
            <a class="nav-link" href="BackPagina03.php">Contact</a>
            <?php
            session_start();
            if(!isset($_SESSION['login'])){
                print("<a class=\"nav-link\" href=\"BackPagina01.php\">Log out</a>");
            }
            ?>
        </nav>
    </div>
</div>