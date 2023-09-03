<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Navigation Bar and Footer Example</title>
    <style>
      
      nav {
        background-color: #5794f7;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1;
      }

      nav a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      nav a:hover {
        background-color: #ddd;
        color: black;
      }

      
      footer {
        background-color: #5794f7;
        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: 1;
      }

      body {
        display: flex;
        flex-direction: column;
        height: 100%;
        margin: 0;
      }

      .g {
        display: flex;
        flex-wrap: wrap;
        margin-top: 70px;
        margin-bottom: 50px;
        justify-content: center;
      }

      .i {
        margin: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 300px;
      }

      img {
        width: 300px;
        height: 200px;
        margin-bottom: 10px;
        box-shadow: 0px 0px 5px black;
      }

      .lb {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 40px;
        box-shadow: 0px 0px 5px black;
      }

      .lb:hover {
        background-color: #3e8e41;
      }

      .un {
        margin-bottom: 10px;
      }

      .wrapper {
        flex: 1;
        overflow-y: auto;
      }
    </style>
  </head>
  <body>
  
    <nav>
      <a href="sess4.php">Home</a>
      <a href="profile.php">Profile</a>
      <a href="users.php">Users</a>
      <a href="index.php">Upload</a>
      <a href="display.php">Display</a>
      <a href="#">Most Likes</a>
      <a href="sess3.php" name="logout">Logout</a>
    </nav>

    <div class="wrapper">
      <div class="g">
        <?php
          $conn = mysqli_connect('localhost', 'root', '', 'radha');
          if (mysqli_connect_error()) {
            die('connection failed');
          }

          $sql = "SELECT username,image,l FROM img2";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="i">';
            echo '<h2 class="un">'.$row['username'].'</h2>';
            echo '<img src="upload/'.$row['image'].'" alt="User Image">';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="photo" value="'.$row['image'].'">';
          }