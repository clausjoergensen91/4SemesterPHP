<?PHP
session_start();
unset($_SESSION['Username']);
unset($_SESSION['password']);
header("Location: http://localhost:8000/index.php");