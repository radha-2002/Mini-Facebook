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
    $user = $_SESSION["name"];
    $sql = "UPDATE img2 SET l = l + 1 WHERE image = '$image_id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
session_start();
if (!isset($_SESSION["name"])) {
  header("Location: sess.php");
  exit();
}
$user = $_SESSION["name"];
$conn=mysqli_connect('localhost',"root","","radha");
$sql = "SELECT image,l FROM img2 WHERE username= '$user'";
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
    <title>Images</title>
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
        color: white;
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
       width: 500px;
       height: 300px;
       box-shadow: 0px 0px 5px black;
       margin-right: 15px;
   }
   body{
       background:url("d.jpg");
       background-size:cover;
           }
      nav a:hover {
        background-color: rgb(100, 150, 200);
        color: black;
      }

      footer {
        background-color: #4267B2;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: auto;
        position: relative;
      }
      

              .g{
                  display: flex;
                  flex-wrap: wrap;
              }

              .un{
                margin-left: 500px;
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


    <h1>My Images</h1>
   <div class="g">
       <?php while ($row = mysqli_fetch_assoc($result)) {
       ?>

       <div>
           <img src="<?php echo "upload/".$row['image']; ?>" alt="User Image">
           <p  class="lb">Likes : <?php echo $row['l']; ?></p>
       </div>

       <?php } ?>
   </div>
  </body>
</html>
