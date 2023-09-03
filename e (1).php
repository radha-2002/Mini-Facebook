<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Facebook Login</title>
    <style>
      
      form {
        margin: 50px auto;
        width: 50%;
        text-align: center;
      }

      
      input[type=text], input[type=email], input[type=password] {
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        width: 100%;
        max-width: 400px;
      }

      
      input[type=submit] {
        background-color: #4267B2;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        max-width: 400px;
      }

      
      a {
        color: #4267B2;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }

      
      label {
        display: inline-block;
        text-align: left;
        width: 100%;
        max-width: 400px;
      }
    </style>
  </head>
  <body>
    <div>

    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "radha";

    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "SELECT username, image, l
            FROM img2
            ORDER BY l DESC
            LIMIT 3";
    $result = mysqli_query($conn, $sql);

    
    echo '<table border=1 style="margin-top:100px;margin-right:20px;width:50%;">';
    echo '<tr><th>Username</th><th>Image</th><th>Likes</th></tr>';

    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['username']) . '</td>';
        echo '<td><img style="width:150px;height:150px;"src="upload/' . htmlspecialchars($row['image']) . '"></td>';
        echo '<td>' . htmlspecialchars($row['l']) . '</td>';
        echo '</tr>';
    }

    
    echo '</table>';
    
    mysqli_close($conn);
    ?>
    <form action="sess2.php" method="POST" style="margin-left:10px;">
      <h1>Log in to Facebook</h1>
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="name">
      <br>
      <label for="email">Email:</label>
      <br>
      <input type="email" id="email" name="email">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="pas">
      <br>
      <input type="submit" value="Log In">
      <br>
      <a href="regis.html">Don't have an account? Sign Up</a>
    </form>
  </div>
  </body>
</html>
