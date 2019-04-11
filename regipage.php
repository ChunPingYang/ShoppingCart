<?php
	$con = mysqli_connect("localhost","root","","amz") or die(mysql_error());
	$email = $username = $password = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type = "text/css" href = "css/regi_style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="validat.js"></script>

</head>
<body>

<div class="container">
  <form method="post" action="signup.php">

    <div class="row">
      <h2 style="text-align:center">Sign up or Login</h2>
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col">
      	<div class="hide-md-lg">
          <p>Sign up:</p>
        </div>

        <input type="text" id="username" name="regi_username" placeholder="Username">
        <input type="text" id= "email" name="email" placeholder="Email">
        <input type="password" id="password1" name="regi_password1" placeholder="Password">
        <input type="password" id="password2" name="regi_password2" placeholder="Confirm Password">
        <input type="submit" value="Sign up" id = "signup" name="signup">
      </div>
  </form>

  <form method="post">
      <div class="col">
        <div class="hide-md-lg">
          <p>Sign in:</p>
        </div>

        <input type="text" name="username" placeholder="Username">
        <?php
        if(isset($_POST["username"]) && !empty($_POST["username"])){
            $username = mysqli_real_escape_string($con, $_POST["username"]);
            $query = "select userid, username, password FROM users WHERE username = '$username';";
            $result = mysqli_query($con,$query);
          
            if(mysqli_num_rows($result)<1){// User not found. So, redirect to login_form again.
                echo "<span  class='error'>Please register first!</span>";
            }
        }  		
        ?>
        <input type="password" name="password" placeholder="Password">
        <?php
        if(isset($_POST["password"]) && !empty($_POST["password"])){
        		while($userData = mysqli_fetch_array($result)){
              if(password_verify($_POST["password"], $userData['password'])){
              //mysqli_close($con);
              $_SESSION["userid"] = $userData['userid'];
              $_SESSION["username"] = $userData['username'];
              
              echo "<span class = 'ok'>Login success</span>";//header('Location:regipage.html');

            }
              else{
              //mysqli_close($con);
              echo "<span  class='error'>Password is wrong!</span>"; 
              session_write_close();
            }
          
            }
          }
        ?>
        <input type="submit" value="Login" name="login">
      </div>
      
    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="#" style="color:white;" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

</body>
</html>

