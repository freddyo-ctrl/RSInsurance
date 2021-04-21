<?php

    if(array_key_exists("next", $_POST)) {
        $required = array("first-name", "middle-name", "last-name", "street-address", "city", "state", "zip", "id-type", "id-number", "expiration-date", "email", "year", "make", "model", "vin");
        $expected = array("first-name", "middle-name", "last-name", "street-address", "city", "state", "zip", "id-type", "id-number", "expiration-date", "email", "year", "make", "model", "vin");
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
            $firstName = $_POST["first-name"];
            $middleName = $_POST["middle-name"];
            $lastName = $_POST["last-name"];
            $streetAddress = $_POST["street-address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zip"];
            $idType = $_POST["id-type"];
            $idNumber = $_POST["id-number"];
            $expirationDate = $_POST["expiration-date"];
            $emailAddress = $_POST["email"];
            $year = $_POST["year"];
            $make = $_POST["make"];
            $model = $_POST["model"];
            $vin = $_POST["vin"];

            $recipient = "cyrell.harris@mavs.uta.edu";
            $subject = "Received a New Quote Request";
            $body = "--- Client info ---\nName: $firstName $middleName $lastName\nEmail address: $emailAddress\nHome address: $streetAddress $city, $state $zip\n\n--- Identification info ---\nIdentification type: $idType\nID number: $idNumber\nID expiration date: $expirationDate\n\n--- Vehicle info ---\nYear: $year\nMake and model: $make $model\nVIN number: $vin";
            $header = "From: form@rsinsurnaceservices.com";

            $emailSentSuccessfully = mail($recipient, $subject, $body, $header);

            header("Location: request-quote-submit.php");
            exit();
        }
    }

    if(array_key_exists("back", $_POST)) {
        header("Location: manage-quotes.php");
        exit();
    }

    $pageTitle = "Request a quote";
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
                <h2>Request a new policy</h2>
                <p>Want to be insured by RS Insurance Services? Fill out the following form.</p>
            </div>

            <div class="col-xs-12 manage-quote-form">
                <form action="" method="post">
                    <div class="manage-quote-form-section">
                        <p>Please provide the full name of the new policy's principal driver.</p>
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
                        <p>Please provide the following information to identify and contact the principal driver.</p>
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="street-address">Street address: </label>
                        <input type="text" id="street-address" name="street-address" value="3841 Daisy Street">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="city">City: </label>
                        <input type="text" id="city" name="city" value="Arlington">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="state">State: </label>
                        <input type="text" id="state" name="state" value="Texas">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="zip">ZIP code: </label>
                        <input type="text" id="zip" name="zip" value="76182">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="id-type">Type of identification: </label>
                        <select id="id-type" name="id-type">
                            <option value="tx-license" selected="selected">Texas driver's license</option>
                            <option value="tx-id">Texas ID card</option>
                            <option value="oos-license">Out-of-state driver's license</option>
                            <option value="oos-id">Out-of-state ID</option>
                            <option value="passport">Foreign passport</option>
                        </select>
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="id-number">ID number: </label>
                        <input type="text" id="id-number" name="id-number" value="6817596">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="expiration-date">Expiration date: </label>
                        <input type="date" id="expiration-date" name="expiration-date" value="2020-12-08">
                    </div>

                    <div class="manage-quote-form-section">
                        <label class="bold-text" for="email">Principal driver's email address: </label>
                        <input type="email" id="email" name="email" value="janedoe@gmail.com">
                    </div>

                    <div class="manage-quote-form-section">
                        <p>Please provide the year, make/model and VIN of the vehicle that you would like to include in your policy.</p>
                    </div>

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
                        <?php
                            if(isset($_COOKIE["username"]) && !empty($_COOKIE["username"])) {
                                echo "<input class=\"button\" type=\"submit\" name=\"back\" value=\"Back\">";
                            }
                        ?>
                        <input class="button" type="submit" name="next" value="Next">
                    </div>
                </form>
            </div>
        </div>
</div>
</main>

<?php

    function getInputValue($inputName) {
        if(isset($inputName) && array_key_exists($inputName, $_POST)) {
            $value = $_POST[$inputName];
            echo "value=\"$value\"";
        }
    }

    include_once("components/inc.footer.php");
?>

