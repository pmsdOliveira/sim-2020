<html>
  <body>
    <?php 
      $connect = mysqli_connect('localhost', 'root', '', 'SIM')
        or die('Error connecting to the server: ' . mysqli_error($connect));

      $sql = 'SELECT * FROM USERS WHERE USERNAME = "' . $_POST['username'] . '"';

      $result = mysqli_query($connect, $sql) or die('The query failed: ' . mysqli_error($connect));
      $number = mysqli_num_rows($result);
      if ($number == 0) {
        $sql = 'INSERT INTO USERS (USERNAME, PASSWORD, NAME, BIRTH_DATE, ADDRESS, PHONE, EMAIL) VALUES (' . 
          '\'' . $_POST['username'] . '\'' . ', ' . 
          '\'' . md5($_POST['password']) . '\'' . ', ' . 
          '\'' . $_POST['name'] . '\'' . ', ' .
          '\'' . $_POST['birth_date'] . '\'' . ', ' . 
          '\'' . $_POST['address'] . '\'' . ', ' . 
          '\'' . $_POST['phone'] . '\'' . ', ' . 
          '\'' . $_POST['email'] . '\'' . ')';
        $result = mysqli_query($connect, $sql) or die('The query failed: ' . mysqli_error($connect));
        echo '<p>Utilizador registado com sucesso.</p>';
      } else {
        include("register.php");
        echo '<p>Utilizador já existente.</p>';
      }
    ?>
  </body>
</html>

