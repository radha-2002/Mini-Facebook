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
<?php session_start();
if($_SESSION['name']=="")
{
  header("location:sess.php");
}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Navigation Bar and Footer Example</title>
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
        position: relative;
      }
      img {
        width: 600px;
      height: 400px;
    margin: 0 auto;
      display: block;
      margin-right: 100px;
     margin-left: 500px;
      margin-bottom: 10px;
      box-shadow: 0px 0px 5px black;
      }

              .g{
                  display: flex;
                  flex-wrap: wrap;
              }
              .lb{
                  background-color: #4CAF50;
                  color: white;
                  border: none;
                  padding: 10px;
                  border-radius: 5px;
                  cursor: pointer;
                  margin-left: 500px;
                  margin-bottom:40px;
                  box-shadow: 0px 0px 5px black;
              }
              .lb:hover{
                  background-color: #3e8e41;
              }
              .un{
                margin-left: 500px;
              }
    </style>
  </head>
  <body>
    <nav>
      <a href="dis.php">Home</a>
      <a href="profile.php">Profile</a>
      <a href="users.php">Users</a>
      <a href="index.php">Upload</a>
      <a href="display.php">Images</a>
      <a href="sess3.php" name="logout">Logout</a>
    </nav>


    <div class="g">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
             <div>
               <h2 class="un"><?php echo $row['username'];?></h2>
              <img src="<?php echo "upload/".$row['image']; ?>" alt="User Image">
              <form action="" method="post">
                  <input type="hidden" name="photo" value="<?php echo $row['image']; ?>">
                  <button type="submit" class="lb">&#x1F44D <?php echo $row['l']; ?></button>
              </form>
           </div>
  <?php } ?>
<div>
  </body>
</html>

<html>
