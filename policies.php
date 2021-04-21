<?php
    $type = "auto";
    
    if(isset($_GET["type"]) && !empty($_GET["type"])) {
        $allowedTypes = array("auto", "motorcycle", "commercial");

        foreach($allowedTypes as $value) {
            if($value === $_GET["type"]) {
                $type = $_GET["type"];
            }
        }
    }

    $pageTitle = "Welcome to RS Insurance Services' website";
    include_once("components/inc.header.php");
?>

<main>
    <div class="container">
        <div class="row policies-area">
            <div class="col-xs-4 policy-selector <?php echo isSelected("auto", $type, "selected"); ?>">
                <a href="policies.php?type=auto">Auto insurance</a>
            </div>
            <div class="col-xs-4 policy-selector <?php echo isSelected("motorcycle", $type, "selected"); ?>">
                <a href="policies.php?type=motorcycle">Motorcycle insurance</a>
            </div>
            <div class="col-xs-4 policy-selector <?php echo isSelected("commercial", $type, "selected"); ?>">
                <a href="policies.php?type=commercial">Commercial vehicle insurance</a>
            </div>

            <div class="col-xs-6 policy-description <?php echo shouldRemainHidden("auto", $type); ?>">
                <h2>Auto policies</h2>

                <div class="row description-text">
                    <div class="col-xs-10">
                        <p>Looking to insure your automobile? We've got you covered.</p>
                        
                        <p>We offer:</p>
                        <ul>
                            <li>Full coverage</li>
                            <li>Liability</li>
                            <li>Insurance for SR-22 drivers</li>
                        </ul>

                        <p>Our full coverage plan covers:</p>
                        <ul>
                            <li>The cost of auto repairs</li>
                            <li>Bodily injury</li>
                            <li>Property damage</li>
                            <li>Uninsured motorist coverage</li>
                        </ul>

                        <p>Call us for a quote today!</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 policy-image <?php echo shouldRemainHidden("auto", $type); ?>">
                <img class="image" src="images/policy-car.webp" alt="Picture of a car">
            </div>

            <div class="col-xs-6 policy-description <?php echo shouldRemainHidden("motorcycle", $type); ?>">
                <h2>Motorcycle policies</h2>

                <div class="row description-text">
                    <div class="col-xs-10">
                        <p>Have a bike instead? We insure those too! We offer some of the lowest-priced motorcycle insurance policies 
                            in the city.</p>

                        <p>We not only insure your bike but also:</p>
                        <ul>
                            <li>Your bike's accessories such as sidecars and storage bags</li>
                            <li>Your helmet</li>
                            <li>Any bodily damage that occurs from an accident on your motorcycle</li>
                        </ul>
                        
                    </div>
                </div>
            </div>

            <div class="col-xs-6 policy-image <?php echo shouldRemainHidden("motorcycle", $type); ?>">
                <img class="image" src="images/policy-motorcycle.webp" alt="Picture of a motorcycle">
            </div>

            <div class="col-xs-6 policy-description <?php echo shouldRemainHidden("commercial", $type); ?>">
                <h2>Commercial policies</h2>

                <div class="row description-text">
                    <div class="col-xs-10">
                        <p>We provide commercial insurance for vehicles used by business employees as well.</p>

                        <p>These vehicles include:</p>
                        <ul>
                            <li>Food service trucks</li>
                            <li>Commercial vans and SUVs</li>
                            <li>Box trucks</li>
                            <li>Utility vehicles</li>
                        </ul>
                        
                        <p>Protect your investment by applying for commercial insurance from RS Insurance Services today!</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 policy-image <?php echo shouldRemainHidden("commercial", $type); ?>">
                <img class="image" src="images/policy-commercial.webp" alt="Picture of a commercial van">
            </div>
        </div>
    </div>
</main>

<?php

    function isSelected($policyType, $type, $CSSClassToAdd) {
        if($policyType === $type) {
            return $CSSClassToAdd;
        }
        else {
            return "";
        }
    }

    function shouldRemainHidden($policyType, $type) {
        if($policyType === $type) {
            return "";
        }
        else {
            return "hidden";
        }
    }

    include_once("components/inc.footer.php");
?>