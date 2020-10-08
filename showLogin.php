<?php session_unset(); ?>

<html>
  <body>
    <form class="login-form" method="POST" action="index.php?op=checkLogin">
      <table>
        <tr>
          <td><label>Username:</label></td>
          <td><input type="text" name="user" /></td>
        </tr>
        <tr>
          <td><label>Password:</label></td>
          <td><input type="password" name="password" /></td>
        </tr>
      </table>
      <input
        class="login-submit"
        type="submit"
        name="submit"
        value="Submit"
      />
    </form>
  </body>
</html>
