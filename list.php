<html>
  <head>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <table align="center" border="1" width="50%">
      <thead>
        <tr>
          <td>Id</td>
          <td>Nome</td>
          <td>Data</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $id = 0;
          while ($id < 10) {
            echo '<tr><td>' . $id. '</td></tr>';
            $id++;
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
