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

          for ($id = ($pageNum - 1) * $pageSize + 1; $id <= $pageNum * $pageSize; $id++) {
            echo '<tr><td class="list-content">' . $id. '</td><td></td><td></td></tr>';
          }
        ?>
      </tbody>
    </table>
    <?php
        for ($i = 1; $i <= 4; $i++) {
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
