<?php

    if(!isset($_COOKIE["username"]) || empty($_COOKIE["username"])) {
        header("Location: index.php");
        exit();
    }

    if(array_key_exists("next", $_POST)) {
        header("Location: index.php");
        exit();
    }

    if(array_key_exists("back", $_POST)) {
        header("Location: manage-quotes.php");
        exit();
    }

    $pageTitle = "Request submitted";
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
                <h2>Your changes have been made!</h2>
            </div>

            <div class="col-xs-12 request-submitted">
                <table>
                    <tr>
                        <th class="table-header" colspan="5">Vehicles currently listed on your policy</th>
                    </tr>
                    <tr>
                        <th>Driver first name</th>
                        <th>Driver last name</th>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Escape</td>
                    </tr>
                    <tr>
                        <td>Jane</td>
                        <td>Doe</td>
                        <td>2010</td>
                        <td>Nissan</td>
                        <td>Maxima</td>
                    </tr>
                </table>
            </div>

            <div class="col-xs-12 manage-quote-form">
                <form action="" method="post"> 
                    <div class="manage-quote-request-submitted-submit-section">
                        <input class="button" type="submit" name="back" value="Manage another quote">
                        <input class="button" type="submit" name="next" value="Go to homepage">
                    </div>
                </form>
            </div>
        </div>
</div>
</main>

<?php
    include_once("components/inc.footer.php");
?>

