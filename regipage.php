<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type = "text/css" href = "css/regi_style.css">

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

        <input type="text" name="regi_username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="regi_password1" placeholder="Password">
        <input type="password" name="regi_password2" placeholder="Confirm Password">
        <input type="submit" value="Sign up" name="signup">
      </div>
  </form>

  <form method="post" action="login.php">
      <div class="col">
        <div class="hide-md-lg">
          <p>Sign in:</p>
        </div>

        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
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

