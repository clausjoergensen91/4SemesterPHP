<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Heeellloo</title>
    </head>
    <body>
        <div class="jumbotron">
            <div class="row">
                <h1>This is contact stuff</h1>
                <p class="lead blog-description text-center">contact contact contact contact contact contact contact </p>
            </div>
        </div>
        <div class="container">
            <div class="col-md-4">
                <form action="/WebPages/Helpers/createUser.php" method="post">
                    Fornavn:<br>
                    <input type="text" name="firstName"><br>
                    Efternavn:<br>
                    <input type="text" name="lastName"><br>
                    Email:<br>
                    <input type="text" name="email"><br>
                    Brugernavn:<br>
                    <input type="text" name="userName"><br>
                    Kodeord:<br>
                    <input type="text" name="password"><br>
                    Administrator rettigheder:<br>
                    <input type="text" name="adminPrivilege"><br>
                    <br>
                    <button type="submit">Opret bruger</button>
                </form>
            </div>
        </div>
    </body>
</html>
