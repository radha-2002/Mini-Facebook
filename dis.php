<?php

if (isset($_POST['photo'])) {
    
    $image_id = $_POST['photo'];

    
    $conn = mysqli_connect('localhost', 'root', '', 'radha');
    if (mysqli_connect_error()) {
        die('connection failed');
    }

    
    $sql = "UPDATE img2 SET l = l + 1 WHERE image = '$image_id'";
    mysqli_query($conn, $sql);

    
    mysqli_close($conn);
}


$conn=mysqli_connect('localhost',"root","","radha");
$sql = "SELECT username,image,l FROM img2";
$files=glob("img/.");
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
    <title>Facebook</title>
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
        padding: 16px 16px;
        text-decoration: none;

      }
   body{
     min-height: 100%;
     display: flex;
     flex-direction: column;
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
      <h1 style="color:white">Facebook</h1>
      <a href="sess4.php">Home</a>
      <a href="profile.php">Profile</a>
      <a href="users.php">Users</a>
      <a href="index.php">Upload</a>
      <a href="display.php">Images</a>
      <a href="sess3.php" name="logout">Logout</a>
    </nav>
    <h1 align="center">Welcome to Facebook</h1>

    <div class="g">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
             <div class="i">
               <h2 class="un"><?php echo $row['username'];?></h2>
              <img src="<?php echo "upload/".$row['image']; ?>" alt="User Image">
              <form action="" method="post">
                  <input type="hidden" name="photo" value="<?php echo $row['image']; ?>">
                  <button type="submit" class="lb">&#x1F44D <?php echo $row['l']; ?></button>
              </form>
           </div>
  <?php } ?>
<div>

    <!-- <footer>
      <p>&copy; 2023 - All rights reserved</p>
    </footer> -->
  </body>
</html>

<html>
