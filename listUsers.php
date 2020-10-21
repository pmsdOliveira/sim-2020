<html>
  <head>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <table class="list-container" border="1">
      <thead>
        <tr class="list-titles">
          <td>Id</td>
          <td>Nome</td>
          <td>Data</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $pageNum = $_GET['pageNum'];
          $pageSize = $_GET['pageSize'];

          $link = mysqli_connect('localhost', 'root', '', 'SIM')
            or die('Error connecting to the server: ' . mysqli_error($connect));
          $query = 'SELECT * FROM USERS';
          $result = mysqli_query($link, $query) or die('The query failed: ' . mysqli_error($link));

          $number = mysqli_num_rows($result);
          $pages = $number / $pageSize + 1;

          for ($id = ($pageNum - 1) * $pageSize + 1; $id <= $pageNum * $pageSize; $id++) {
            $users = mysqli_fetch_array($result, MYSQLI_NUM);
            echo '<tr>
                    <td class="list-content">' . $id. '</td>
                    <td>' . $users[1] . '</td>
                    <td>' . $users[4] . '</td>
                  </tr>';
          }
        ?>
      </tbody>
    </table>
    <?php
        for ($i = 1; $i <= $pages; $i++) {
          $lowerLim = ($i - 1) * $pageSize + 1;
          $upperLim = $i * $pageSize;

          if ($i == $pageNum) {
            echo '<a>' . $lowerLim . '-' . $upperLim . '</a>&nbsp;';
          } else {
            echo '<a href="?op=listUsers&pageNum=' . $i . '&pageSize=' . $pageSize . '">'
              . $lowerLim . '-' . $upperLim . '</a>&nbsp;';
          }
        }
    ?> 
  </body>
</html>
