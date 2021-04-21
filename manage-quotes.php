<?php

    if(!isset($_COOKIE["username"]) || empty($_COOKIE["username"])) {
        header("Location: index.php");
        exit();
    }

    if(array_key_exists("next", $_POST)) {
        $required = array("name", "email", "phone-number", "policy-type");
        $expected = array("name", "email", "phone-number", "policy-type");
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
            if($_POST["policy-type"] === "change") {
                header("Location: manage-quotes2.php");
                exit();
            }
            else if($_POST["policy-type"] === "new") {
                header("Location: request-quote.php");
                exit();
            }
        }
    }

    $pageTitle = "Manage a quote";
    include_once("components/inc.header.php");
?>

<main>
    <div class="container">
        <div class="row manage-quote">
            <?php
                if(isset($errorMessage)) {
                    echo $errorMessage;
                }
            ?>
            <div class="col-xs-12 manage-quote-description">
                <?php
                    if(isset($_COOKIE["username"]) && !empty($_COOKIE["username"])) {
                        $name = $_COOKIE["username"];
                        echo "<h2>Welcome back $name,</h2>";
                    }
                ?>
                <h2>Manage my Quotes</h2>
                <p>Need to make a change to your policy? Interested in being insured by RS Insurance Services? Fill in the form below!</p>
            </div>

            <div class="col-xs-12 manage-quote-form">
                <form action="" method="post"> 
                    <div class="manage-quote-form-section">
                        <p>Please provide your first and last name, email address, and phone number in order for us to contact you.</p>
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="name">Full name: </label>
                        <input type="text" id="name" name="name" value="Jane Doe">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="email">Email address: </label>
                        <input type="email" id="email" name="email" value="janedoe@gmail.com">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="phone-number">Phone number: </label>
                        <input type="text" id="phone-number" name="phone-number" value="123-456-7890">
                    </div>

                    <div class="manage-quote-form-section">
                        <p>Please answer the questions below for us to assist you with your concerns.</p>
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="policy-type">Are you requesting a change in an existing policy or getting a quote for a new policy? </label>
                        <select id="policy-type" name="policy-type">
                            <option value="change" selected="selected">Change in existing policy</option>
                            <option value="new">Getting a quote for a new policy</option>
                        </select>
                    </div>

                    <div class="manage-quote-form-submit-section">
                        <input class="button" type="submit" name="next" value="Next">
                    </div>
                </form>
            </div>
        </div>
</div>
</main>

<?php
    include_once("components/inc.footer.php");
?>

