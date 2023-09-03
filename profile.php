<?php
if (isset($_POST['photo'])) {
    $image_id = $_POST['photo'];
    $conn = mysqli_connect('localhost', 'root', '', 'radha');
    if (mysqli_connect_error()) {
        die('connection failed');
    }
    session_start();
    if (!isset($_SESSION["name"])) {
      header("Location: sess.php");
      exit();
    }
    $username = $_SESSION["name"];
    $sql = "UPDATE img2 SET l = l + 1 WHERE image = '$image_id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
$conn=mysqli_connect('localhost',"root","","radha");
$sql = "SELECT * FROM img2";
$files=glob("D:\xampp\htdocs\minifb\upload");
$result = mysqli_query($conn, $sql);
if (mysqli_connect_error()){
    die('connection failed');
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Profiles</title>
    <style>
      nav {
        background-color: #4267B2;
        overflow: hidden;
      }
     html{
       height:100%;
     }
      nav a {
        float: left;
        display: block;
        color:white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
   body{
     min-height: 100%;
     display: flex;
     flex-direction: column;
   }
   table {
       color: darkblue;
       font-size: 30px;
   }
   img {
       width: 300px;
       height: 200px;
   }
   body{
       background:url("d.jpg");
       background-size:cover;
           }
      nav a:hover {
        background-color: #ddd;
        color: black;
      }
      footer {
        background-color: #4267B2;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: auto;
      }
      .ui{
        margin-top: 100px;
        margin-left: 650px;
      }
    </style>
  </head>
  <body>
    <nav>
      <h1 style="color:white">Facebook</h1>
      <a href="dis.php">Home</a>
      <a href="profile.php">Profile</a>
      <a href="users.php">Users</a>
      <a href="index.php">Upload</a>
      <a href="display.php">Images</a>
      <a href="sess3.php" name="logout">Logout</a>
    </nav>


    <div>
      <h1 class="ui">User Info</h1>
      <?php
$host = "localhost";
$username = "root";
$password = "";
$database = "radha";
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
session_start();
if (!isset($_SESSION["name"])) {
  header("Location: sess.php");
  exit();
}
$user = $_SESSION["name"];
$s="SELECT user_id FROM fb1 WHERE Username='$user';";
$id= mysqli_query($conn, $s);
$sql = "SELECT * FROM fb1 WHERE Username='$user';";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $name = $row['Username'];
    $email = $row['email'];
    $phone = $row['Mobile'];
    $dob = $row['Dob'];
    $gender = $row['Gender'];


    echo '<table border=1 style="width:100%;height:30%;margin-top:100px;color:black;">';
    echo '<h1 style="color:black;text-align:center>Profile of"'. $name . '</h1>';
    echo '<tr colspan="2"><th colspan="2">User Name</th><td colspan="2">' . $name . '</td></tr>';
    echo '<tr colspan="2"><th colspan="2">Email id</th><td>' . $email . '</td></tr>';
    echo '<tr><th colspan="2">Mobile</th ><td>' . $phone . '</td></tr>';
    echo '<tr colspan="2"><th colspan="2">Date of Birth</th><td>' . $dob . '</td></tr>';
    echo '<tr><th colspan="2">Gender</th><td>' . $gender . '</td></tr>';
    echo '</table>';
} else {
    echo 'User not found.';
}
mysqli_close($conn);
?>
    </div>
  </body>
</html>

<html>
