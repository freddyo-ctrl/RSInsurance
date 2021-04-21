<?php
    if(array_key_exists("submit", $_POST)) {
        $required = array("name", "username", "email", "password", "phone-number");
        $expected = array("name", "username", "email", "password", "phone-number");
        $missing = array();

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

            setcookie("username", $username, time() + 14400);
            $_COOKIE["username"] = $username;
            header("Location: index.php");
            exit();
        }
    }

    $pageTitle = "Sign Up";
    include_once("components/inc.header.php");
?>

<main>
    <div class="container">
        <?php
            if(isset($errorMessage)) {
                echo $errorMessage;
            }
        ?>
        <div class="row signup">
            <div class="col-xs-12 signup-description">
                <h2>Sign Up</h2>
                <p>Sign up here to manage your account!</p>
            </div>

            <div class="col-xs-12 signup-form">
                <form action="" method="post">
                    <div class="signup-form-section">
                        <p>Enter your full name and email address to begin</p>
                    </div>

                    <div class="signup-form-section">
                        <label class="bold-text" for="name">Full name: </label>
                        <input type="text" id="name" name="name" value="Jane Doe">
                    </div>

                    <div class="signup-form-section">
                        <label class="bold-text" for="username">Username: </label>
                        <input type="text" id="username" name="username" value="ctec">
                    </div>

                    <div class="signup-form-section">
                        <label class="bold-text" for="email">Email address: </label>
                        <input type="email" id="email" name="email" value="janedoe@gmail.com">
                    </div>

                    <div class="signup-form-section">
                        <label class="bold-text" for="password">Password: </label>
                        <input type="password" id="password" name="password" value="4309">
                    </div>

                    <div class="signup-form-section">
                        <label class="bold-text" for="phone-number">Phone number: </label>
                        <input type="text" id="phone-number" name="phone-number" value="123-456-7890">
                    </div>

                    <div class="signup-form-submit-section">
                        <input class="button" type="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
    include_once("components/inc.footer.php");
?>
