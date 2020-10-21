<html>
  <body>
    <?php 
      if(!isset($_SESSION)) 
      { 
        session_start(); 
      }

      $connect = mysqli_connect('localhost', 'root', '', 'SIM')
        or die('Error connecting to the server: ' . mysqli_error($connect));

      $sql = 'SELECT * FROM USERS WHERE (username = "' . $_POST['user'] . '" AND
        password = "' . $_POST['password'] . '")';

      $result = mysqli_query($connect, $sql) or die('The query failed: ' . mysqli_error($connect));

      $number = mysqli_num_rows($result);
      if ($number == 1) {
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

