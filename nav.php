<html>

<head>
    <style>
        body {
            background-color:azure;
        }
    </style>
</head>
<form action="sess3.php" method="post">
    <input type="submit" name="logout" value="back to login page" align="center">
</form>
</html>
<?php
session_start(); ?>
<h1 align="center" id="h1">welcome
    <?php
        if(isset($_SESSION['name'])){
            echo $_SESSION['name'];
            }
            else{
                header('Location:sess.php');
            }
    ?></h1>
