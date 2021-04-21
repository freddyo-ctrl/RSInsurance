<?php
    if(array_key_exists("submit", $_POST)) {
        $required = array("username", "password");
        $expected = array("username", "password");

        foreach($expected as $field) {
          $fieldBeingChecked = $_POST[$field];

          if(in_array($field, $required) && empty($fieldBeingChecked)) {
              array_push($missing, $field);
          }
      }

      if(!empty($missing)) {
          $missingFields = implode(", ", $missing);
          $errorMessage = "<p>The following fields are missing: $missingFields. Please fill them in before continuing.</p>";
      }
      else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === "ctec" && $password === "4309") {
          setcookie("username", $username, time() + 14400);
          $_COOKIE["username"] = $username;
          header("Location: index.php");
          exit();
        }
        else {
          $message = "<p>The user name and password you provided are incorrect.  Please try again.</p>";
        }
      }
    }

    $pageTitle = "RS Insurance Log In";
    include_once("components/inc.header.php");
?>

<main>
    <div class="container">
        <?php $message ?>
        <div class="col-xs-12 login-description">
            <h2>Login</h2>
            <p>Login and manage your account</p>
        </div>
        <div class="col-xs-12 login-form">
            <form action="" method="post">
                <div class="login-form-section">
                    User name: <input name="username" type='text'>
                </div>
                <div class="login-form-section">
                    Password: <input name="password" type='password'>
                </div>
                <div class="login-form-section">
                    <p class="registration-link">Don't have an account? <a href="signup.php">Create one here!</a></p>
                </div>
                <div class="login-form-submit-section">
                    <input name="submit" type="submit" value="Log in">
                </div>
            </form>
        </div>
    </div>
</main>

<?php
    include_once("components/inc.footer.php");
?>
