<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
      <?php 
      include "css_style/index.css";
      ?>
    </style>
</head>
<body>
  <!--login page -->
    <section class="login">
        <form class="modal-content animate" action="admin/admin.php" method="POST">
          <!--login inputs -->
            <div class="container">
              <label for="uname"><b>Login</b></label>
              <input type="text" placeholder="Login" name="login" required>
        
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>
        
              <button type="submit">Login</button>
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
        
            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form>
    </section>
</body>
</html>