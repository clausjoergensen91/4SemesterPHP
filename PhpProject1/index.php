<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BSI Stuff</title>
    </head>
    <body>
        <?php
        foreach (glob("Model/*.php") as $filename) {
            include_once $filename;
        }
        include_once 'SOAPConnect.php';
        ?>
    </body>
</html>
