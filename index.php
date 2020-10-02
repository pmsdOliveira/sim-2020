<!DOCTYPE html>

<html>
  <head>
    <title>Clínica SIM - FCT</title>
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body>
    <table align="center" border="1" width="95%">
      <thead>
        <tr>
          <td colspan="2">
            <a href="http://www.fct.unl.pt/">
              <img class="logo" src="assets/logo.png" />
            </a>
            <h1 class="header-title"><bold>HOSPITAL SIM - FCT</bold></h1>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="menu">
            <a class="menu-title"><strong>Opções</strong></a>
            <a href="?operacao=homepage">Apresentação</a>
            <a href="?operacao=showLogin">Login</a>
          </td>
          <td align="center">
            <?php
              switch ($_GET['operacao']) {
                case 'homepage': include("homepage.php"); break;
                case 'showLogin': include("showLogin.php"); break;
              }
            ?>
          </td>
        </tr>
      </tbody>
      <tfooter>
        <tr bgcolor="#ccc">
          <td class="footer-title" colspan="2">&copy;Alunos 2020/2021</td>
        </tr>
      </tfooter>
    </table>
  </body>
</html>