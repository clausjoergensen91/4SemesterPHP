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
            <a class="navbar-brand" href="/WebPages/Index.aspx"><img src="/WebPages/images/logo.jpg" width="30" height="30"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/Index.php">Hjem</a></li>
                <li><a href="/WebPages/About.php">Om klubben</a></li>
                <li><a href="/WebPages/Calendar.php">Se kalender</a></li>
                <li><a href="/WebPages/Contact.php">Kontakt os</a></li>
                <li><a href="/WebPages/Admin/AdminPage.php">Admin</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><asp:Button ID="LoginBut" runat="server" OnClick="LogInMethod" class="loginBut"/> </li>
                <li><a href="/WebPages/CreateUser.php">Opret bruger</a></li>
                <li><asp:Label ID="StatusLabel" runat="server" /></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>