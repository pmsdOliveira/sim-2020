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
          $maxIDLastPage = $pageSize * ($pageNum - 1);

          $link = mysqli_connect('localhost', 'root', '', 'SIM')
            or die('Error connecting to the server: ' . mysqli_error($connect));
          $query = 'SELECT * FROM USERS WHERE ID > ' . $maxIDLastPage;
          $result = mysqli_query($link, $query) or die('The query failed: ' . mysqli_error($link));

          $number = mysqli_num_rows($result);
          $pages = $number / $pageSize + 1;

          if ($number < $pageSize)
            $nRows = $number;
          else
            $nRows = $pageSize;

          for ($id = 0; $id < $nRows; $id++) {
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo '<tr>
                    <td class="list-content">' . $user["ID"] . '</td>
                    <td>' . $user["NAME"] . '</td>
                    <td>' . $user["CREATION_DATE"] . '</td>
                  </tr>';
          }
        ?>
      </tbody>
    </table>
    <?php
        for ($i = 1; $i <= $pages; $i++) {
          $lowerLim = ($i - 1) * $pageSize + 1;
          if ($number < $pageSize)
            $upperLim = ($i - 1) * $pageSize + $number;
          else
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
