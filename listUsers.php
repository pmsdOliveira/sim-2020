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

          $query = 'SELECT * FROM USERS';
          $result = mysqli_query($link, $query) or die('The query failed: ' . mysqli_error($link));
          $totalUsers = mysqli_num_rows($result);
          $pages = intval($totalUsers / $pageSize + 1);
          
          $query = 'SELECT * FROM USERS WHERE ID > ' . $maxIDLastPage . ' LIMIT ' . $pageSize;
          $result = mysqli_query($link, $query) or die('The query failed: ' . mysqli_error($link));
          $usersInPage = mysqli_num_rows($result);

          if ($pageSize > $usersInPage)
            $nRows = $usersInPage;
          else
            $nRows = $pageSize;

          for ($i = 1; $i <= $nRows; $i++) {
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo '<tr>
                    <td class="list-id">' . $user["ID"] . '</td>
                    <td class="list-content">' . $user["NAME"] . '</td>
                    <td class="list-content">' . $user["CREATION_DATE"] . '</td>
                  </tr>';
          }
        ?>
      </tbody>
    </table>
    <?php
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
    ?> 
  </body>
</html>
