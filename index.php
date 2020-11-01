<!DOCTYPE html>

<?php
    session_start(); 

    $isLogged = false;
    if (isset($_SESSION['authuser']) AND $_SESSION['authuser'] == 1) {
      $isLogged = true;
    }
?>

<html>
  <head>
    <title>Clínica SIM - FCT</title>
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body>
    <table class="container" border="1">
      <thead>
        <tr>
          <td colspan="2">
            <a href="http://www.fct.unl.pt/">
              <img class="logo" src="assets/logo.png" />
            </a>
            <h1 class="header-title">HOSPITAL SIM - FCT</h1>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="menu-container">
            <table class="menu-table">
              <tr class="menu-title"><td><a>Opções</a></td></tr>
              <tr><td><a href="?op=homepage">Apresentação</a></td></tr>
              <?php
              if ($isLogged) {
                echo '<tr><td><a href="?op=listUsers&pageNum=1&pageSize=10">Listar</a></tr></td>';
                echo '<tr><td><a href="?op=logout">Logout</a></tr></td>';
              } else {
                echo '<tr><td><a href="?op=showLogin">Login</a></tr></td>';
                echo '<tr><td><a href="?op=register">Registo</a></tr></td>';
              }
            ?>
            </table>
          </td>
          <td align="center">
            <?php
              if (!isset($_GET['op'])) {
                header("Location: ?op=homepage");
              } else {
                $op = $_GET['op'];

                if ($op != 'homepage' AND $op != 'checkLogin' AND
                  $op != 'register' AND $op != 'checkRegister') {// CHECK LOGIN PRIORITY OVER REST OF PAGES
                  if (!$isLogged AND $op != 'showLogin') {
                    header("Location: ?op=showLogin");
                  }
                } 
              }
              
              switch ($_GET['op']) {
                case 'homepage': include("homepage.php"); break;
                case 'showLogin': include("showLogin.php"); break;
                case 'checkLogin': include("checkLogin.php"); break;
                case 'logout': include("logout.php"); break;
                case 'listUsers': include("listUsers.php"); break;
                case 'register': include("register.php"); break;
                case 'checkRegister': include("checkRegister.php"); break;
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
