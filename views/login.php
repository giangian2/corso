<html>

<head>
  <style>
    <?php
      require_once("../css/login.css");
    ?>
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active" id="login">Sign In</h2>
    <h2 class="inactive underlineHover" id="registrati">Sign Up </h2>

    <!-- Icon -->
    <div class="fadeIn first">

    <div id="result">
    <form action="auth/" method="POST">
      <input type="text" id="login" class="fadeIn second" name="uname" placeholder="username">
      <input type="password" id="password" class="fadeIn third" name="passw" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
      <?php
        if(isset($_SESSION['loginErr'])){
          echo("<h4>".$_SESSION['loginErr']."</h4>");
        }
      ?>
    </form>
    </div >
    </div>
    <!-- Login Form -
    

     -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<script>
  <?php
    require_once("../js/loginScript.js");
  ?>
</script>


</body>

</html>
