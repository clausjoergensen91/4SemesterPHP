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
        <link href="/WebPages/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/WebPages/css/custom.css" rel="stylesheet" />

        <!-- jQuery CDN from Google-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="/WebPages/Scripts/jquery-2.2.3.js"></script>
        <script src="/WebPages/Scripts/jquery-2.2.3.min.js"></script>
        <script src="/WebPages/Scripts/jquery-2.2.3.intellisense.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        ?>
        <div><?php include ('/WebPages/Menu.php'); ?></div>
        <div>
            <?php
            if (isset($page_content) == false) {
                $page_content = '/WebPages/ContentPages/HomeContent.php';
            }
            include ($page_content);
            ?>
        </div>
        <div><?php include ('/WebPages/Footer.php'); ?></div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="Scripts/bootstrap.min.js"></script>
    </body>
</html>
</html>
