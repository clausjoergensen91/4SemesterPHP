<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content=""/>
        <title>Bælum/Solbjerg Idrætsforening</title>

        <!--This is Font-awesome-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" />

        <!--This is our Google font and Font-awesome-->
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css' />

        <!--core CSS-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />

        <!-- jQuery CDN from Google-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="Scripts/jquery-2.2.3.js"></script>
        <script src="Scripts/jquery-2.2.3.min.js"></script>
        <script src="Scripts/jquery-2.2.3.intellisense.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!-- Start of header-->
    <!-- Fixed masthead -->
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
                <a class="navbar-brand" href="/Index.aspx"><img src="/images/logo.jpg" width="30" height="30"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="Index.aspx">Hjem</a></li>
                    <li><a href="/About.aspx">Om klubben</a></li>
                    <li><a href="/Calendar.aspx">Se kalender</a></li>
                    <li><a href="/Contact.aspx">Kontakt os</a></li>
                    <li><a href="/Admin/AdminPage.aspx">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><asp:Button ID="LoginBut" runat="server" OnClick="LogInMethod" class="loginBut"/> </li>
                    <li><a href="/CreateUser.aspx">Opret bruger</a></li>
                    <li><asp:Label ID="StatusLabel" runat="server" /></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- End of header-->

<footer>
    <p>&copy; 2015 Company, Inc.</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="Scripts/bootstrap.min.js"></script>
</body>
</html>
