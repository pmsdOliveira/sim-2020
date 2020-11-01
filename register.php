<html>
  <head>
    <script type="text/javascript">
      const validateBirthDate = date => {
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();

        const parts = date.split("/");
        const day = parseInt(parts[0]);
        const month = parseInt(parts[1]);
        const year = parseInt(parts[2]);

        if(year < currentYear - 150 || year > currentYear || month < 1 || month > 12)
            return false;

        let monthsLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

        // Ano bissexto
        if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
            monthsLength[1] = 29;

        if (day > 0 && day <= monthsLength[month - 1]) {
          let dateFormat = year.toString() + "/" + month.toString() + "/" + day.toString();
          document.getElementById("register-birthdate").value = dateFormat;

          return true;
        }
      }

      const validateMail = mail => {
        // Made using https://regexr.com/
        const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        return regex.test(mail.toLowerCase());
      }

      const validatePhone = phone => {
        // Made using https://regexr.com/
        const regex = /^\d{9}$/;

        return regex.test(phone);
      }

      const validateForm = () => {
        const username = document.getElementById("register-username").value;
        const password = document.getElementById("register-password").value;
        const name = document.getElementById("register-name").value;
        const birthDate = document.getElementById("register-birthdate").value;
        const address = document.getElementById("register-address").value;
        const phone = document.getElementById("register-phone").value;
        const email = document.getElementById("register-email").value;

        if (username == "" || password == "" || name == "" || birthDate == "" || address == "" || email == "" || phone == "") {
          alert("Por favor preencha todos os campos");
          return false;
        } else if (username.length < 3) {
          alert("O campo Username tem de ter pelo menos 3 caracteres");
          return false;
        } else if (password.length < 3) {
          alert("O campo Password tem de ter pelo menos 3 caracteres");
          return false;
        } else if (name.length < 3) {
          alert("O campo Nome tem de ter pelo menos 3 caracteres");
          return false;
        } else if (!validateBirthDate(birthDate)) {
          alert("Data de nascimento inválida");
          return false;
        } else if (address.length < 3) {
          alert("O campo Morada tem de ter pelo menos 3 caracteres");
          return false;
        } else if (!validatePhone(phone)) {
          alert("Número de telefone inválido");
          return false;
        } else if (!validateMail(email)) {
          alert("E-mail inválido");
          return false;
        }
        
        return true;
      }
    </script>
  </head>

  <body>
    <form
      class="login-form"
      method="POST"
      action="index.php?op=checkRegister" 
      onsubmit="return validateForm()"
    >
      <table>
        <tr>
          <td><label>Username:</label></td>
          <td><input id="register-username" type="text" name="username" /></td>
        </tr>
        <tr>
          <td><label>Password:</label></td>
          <td><input id="register-password" type="password" name="password" /></td>
        </tr>
        <tr>
          <td><label>Nome:</label></td>
          <td><input id="register-name" type="text" name="name" /></td>
        </tr>
        <tr>
          <td><label>Data de Nascimento:</label></td>
          <td><input id="register-birthdate" type="text" name="birth_date" /></td>
        </tr>
        <tr>
          <td><label>Morada:</label></td>
          <td><input id="register-address" type="text" name="address" /></td>
        </tr>
        <tr>
          <td><label>Telefone:</label></td>
          <td><input id="register-phone" type="text" name="phone" /></td>
        </tr>
        <tr>
          <td><label>E-Mail:</label></td>
          <td><input id="register-email" type="text" name="email" /></td>
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