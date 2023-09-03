<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pas = $_POST["pas"];


    $host = 'localhost';
    $uname = 'root';
    $password = "";
    $dbname = "radha";
    $conn = mysqli_connect($host, $uname, $password, $dbname);
    if ($conn) {
        echo "Connected successful.";
    } else {
        echo "Connection Failed.";
        die("Connection Failed:" . mysqli_connect_error());
    }
    $sql = "select * from fb1 where Username='$name' and email='$email' and Password='$pas'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        session_start();

        $_SESSION['name'] = $name;
        header('Location:sess4.php');
    } else {
        echo "PLLES";
        echo "<script> alert('Invalid Credentials')</script>";
        header('Location:sess3.php');
    }
}
?>
