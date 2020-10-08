<html>
  <body>
    <?php 
      session_start();

      if (($_POST['user'] == 'admin') AND ($_POST['password'] == '12345')) {
        $_SESSION['authuser'] = 1;
        $_SESSION['username'] = $_POST['user'];
        echo '<p>Login bem sucedido</p>';
      } else {
        $_SESSION['authuser'] = 0;
        include("showLogin.php");
        echo '<p>Login incorreto</p>';
      }
    ?>
  </body>
</html>

