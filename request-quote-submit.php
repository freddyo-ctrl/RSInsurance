<?php

    if(array_key_exists("next", $_POST)) {
        header("Location: index.php");
        exit();
    }

    if(array_key_exists("back", $_POST)) {
        header("Location: manage-quotes.php");
        exit();
    }

    if(array_key_exists("request", $_POST)) {
        header("Location: request-quote.php");
        exit();
    }

    $pageTitle = "Request successfully submitted";
    include_once("components/inc.header.php");
?>

<main>
    <div class="container">
        <div class="row manage-quote">
            <div class="col-xs-12 manage-quote-description">
                <h2>Your request has been sent</h2>
                <p>Thank you so much for contacting us. Please allow until the end of the next business day to receive a response.</p>
                <p>In the meantime, please feel free to browse our <a href="faq.php">insurance FAQs</a> or <a href="about.php">gallery</a>.</p>
            </div>

            <div class="col-xs-12 manage-quote-form">
                <form action="" method="post"> 
                    <div class="manage-quote-request-submitted-submit-section">
                        <?php
                            if(isset($_COOKIE["username"]) && !empty($_COOKIE["username"])) {
                                echo "<input class=\"button\" type=\"submit\" name=\"back\" value=\"Manage another quote\">";
                            }
                            else {
                                echo "<input class=\"button\" type=\"submit\" name=\"request\" value=\"Request another quote\">";
                            }
                        ?>
                        <input class="button" type="submit" name="next" value="Go to homepage">
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

