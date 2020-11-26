<html>
  <head>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <?php
      $pageNum = $_GET['pageNum'];
      $pageSize = $_GET['pageSize'];
      $maxIDLastPage = $pageSize * ($pageNum - 1);

      $link = mysqli_connect('localhost', 'root', '', 'SIM')
        or die('Error connecting to the server.');

      $query = 'SELECT * FROM USERS';
      $result = mysqli_query($link, $query) or die('The query failed: ' . mysqli_error($link));
      $totalUsers = mysqli_num_rows($result);
      
      if ($totalUsers > 0) {
        echo '<table class="list-container" border="1">
                <tr class="list-titles">
                <td>Id</td>
                <td>Nome</td>
                <td>Data</td>
              </tr>';

        $pages = intval($totalUsers / $pageSize + 1);
      
        $query = 'SELECT * FROM USERS WHERE ID > ' . $maxIDLastPage . ' LIMIT ' . $pageSize;
        $result = mysqli_query($link, $query) or die('The query failed: ' . mysqli_error($link));
        $usersInPage = mysqli_num_rows($result);

        while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          echo '<tr>
                  <td class="list-id">' . $user["ID"] . '</td>
                  <td class="list-content">' . $user["NAME"] . '</td>
                  <td class="list-content">' . $user["CREATION_DATE"] . '</td>
                </tr>';
        }

        echo '</table>';
        
        for ($page = 1; $page <= $pages; $page++) {
          $lowerLim = ($page - 1) * $pageSize + 1;
          $maxIDNextPage = $page * $pageSize;
          
          if ($maxIDNextPage > $totalUsers)
            $upperLim = $totalUsers;
          else
            $upperLim = $maxIDNextPage;
          
          if ($page == $pageNum) {  // don't create link for current page
            echo '<a>' . $lowerLim . '-' . $upperLim . '</a>&nbsp;';
          } else {
            echo '<a href="?op=listUsers&pageNum=' . $page . '&pageSize=' . $pageSize . '">'
              . $lowerLim . '-' . $upperLim . '</a>&nbsp;';
          }
        }
      } else {
        echo '<p>Ainda não foram registados utilizadores na plataforma.</p>';
      }
    ?> 
  </body>
</html>
