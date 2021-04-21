<?php

    if(!isset($_COOKIE["username"]) || empty($_COOKIE["username"])) {
        header("Location: index.php");
        exit();
    }

    if(array_key_exists("next", $_POST)) {
        $required = array("year", "make", "model", "vin");
        $expected = array("year", "make", "model", "vin");
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
        else if(!is_numeric($_POST["year"]) || !is_numeric($_POST["vin"])) {
            $errorMessage = "<p>The year and VIN fields must be numeric.</p>";
        }
        else {
            header("Location: manage-quotes-submit.php");
            exit();
        }
    }

    if(array_key_exists("back", $_POST)) {
        header("Location: manage-quotes2.php");
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
                <h2>Add a new vehicle to an existing policy</h2>
                <p>Please provide the year, make/model and VIN of the vehicle(s) you would like to include in your policy.</p>
            </div>

            <div class="col-xs-12 manage-quote-form">
                <form action="" method="post"> 
                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="year">Year: </label>
                        <input type="text" id="year" name="year" value="2010">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="make">Make: </label>
                        <input type="text" id="make" name="make" value="Nissan">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="model">Model: </label>
                        <input type="text" id="model" name="model" value="Maxima">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="vin">17-digit vehicle identifiction number (VIN): </label>
                        <input type="text" id="vin" name="vin" value="19384589250125368">
                    </div>

                    <div class="manage-quote-form-submit-section">
                        <input class="button" type="submit" name="back" value="Back">
                        <input class="button" type="submit" name="next" value="Submit">
                    </div>
                </form>
            </div>
        </div>
</div>
</main>

<?php
    include_once("components/inc.footer.php");
?>

