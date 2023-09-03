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
      .top{
                background-color: #4267B2;
                height: max-content;
                color:beige;

            }
    </style>
  </head>
  <body>
    <div class="top" >
        <img src="ima1.jpg" align="left" height="80px" width="80px">
        <center><h1 color:"white">FACEBOOK</h1></center>
         <center><h4>Connnect With Friends</h4></center>
         </div>
    <div style="padding-left:-40px;margin-left:500px;">
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
</div style="background-color:yellow;margin-top:50px;">
   
</div>
  </body>
</html>
