<nav class="navbar navbar-masthead navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/Index.php"><img src="/WebPages/images/logo.jpg" width="30" height="30"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/Index.php">Hjem</a></li>
                <li><a href="/WebPages/About.php">Om klubben</a></li>
                <li><a href="/WebPages/Calendar.php">Se kalender</a></li>
                <li><a href="/WebPages/Contact.php">Kontakt os</a></li>
                <li><a href="/WebPages/Admin/Admin.php">Admin</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/CreateUser.php">Opret bruger</a></li>
                <?php
                if(session_status()!= PHP_SESSION_ACTIVE)
                {
                    session_start();
                }
                    
                    if(!isset($_SESSION['Username'])) 
                    {
                        echo "<i><a href=\"/WebPages/login.php\">Log ind</a></i>";
                    }
                    else
                    {
                        echo "<i><a href=\"/WebPages/helpers/Logout.php\">Log ud</a></i>";
                    }
                 ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>