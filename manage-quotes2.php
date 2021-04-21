<?php

    if(!isset($_COOKIE["username"]) || empty($_COOKIE["username"])) {
        header("Location: index.php");
        exit();
    }

    if(array_key_exists("next", $_POST)) {
        $required = array("first-name", "middle-name", "last-name", "policy-number", "change-type");
        $expected = array("first-name", "middle-name", "last-name", "policy-number", "change-type");
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
            if($_POST["change-type"] === "driver-change") {
                header("Location: manage-quotes3.php?type=driver-change");
                exit();
            }
            else if($_POST["change-type"] === "information-change") {
                header("Location: manage-quotes3.php?type=information-change");
                exit();
            }
            else if($_POST["change-type"] === "vehicle-change") {
                header("Location: manage-quotes3.php?type=vehicle-change");
                exit();
            }
            else if($_POST["change-type"] === "add-vehicle") {
                header("Location: manage-quotes3.php?type=add-vehicle");
                exit();
            }
        }
    }

    if(array_key_exists("back", $_POST)) {
        header("Location: manage-quotes.php");
        exit();
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
                <h2>Change an existing policy</h2>
                <p>Please keep in mind that any changes in a policy will require a verbal approval from the principal driver in the policy in order for the change to be enacted.
                   RS Insurance Services charges a minimum of $15 for any changes made to a policy, not including any charges that your particular insurance company requires upon payment.</p>
            </div>

            <div class="col-xs-12 manage-quote-form">
                <form action="" method="post"> 
                    <div class="manage-quote-form-section">
                        <p>Please provide the full name of the principal driver of the policy of which you wish to make changes.</p>
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="first-name">First name: </label>
                        <input type="text" id="first-name" name="first-name" value="Jane">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="middle-name">Middle name (if any): </label>
                        <input type="text" id="middle-name" name="middle-name" value="Alice">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="last-name">Last name: </label>
                        <input type="text" id="last-name" name="last-name" value="Doe">
                    </div>

                    <div class="manage-quote-form-section">
                        <p>Please provide the policy number of the policy of which you wish to make changes.</p>

                        <label class="bold-text" for="policy-number">Policy number: </label>
                        <input type="text" id="policy-number" name="policy-number" value="195-68245-83">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="change-type">Choose which change you would like to make to your policy: </label>
                        <select id="change-type" name="change-type">
                            <option value="driver-change" selected="selected">Change in driver(s)</option>
                            <option value="information-change">Change in driver information</option>
                            <option value="vehicle-change">Change in vehicle(s)</option>
                            <option value="add-vehicle" selected="selected">Add new vehicle(s)</option>
                        </select>
                    </div>

                    <div class="manage-quote-form-submit-section">
                        <input class="button" type="submit" name="back" value="Back">
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

