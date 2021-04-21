<?php
    $pageTitle = "Welcome to RS Insurance Services' website";
    include_once("components/inc.header.php");
?>

<main>
    <div class="container">
        <div class="row covid-banner">
            <div class="covid-information">
                <h3>Help us to fight COVID-19!</h3>
                <p>The office is now open to provide services to our clients with the following recommendations:</p>
                <ul>
                    <li>Use of face mask</li>
                    <li>No children allowed</li>
                    <li>Stay at least 6 feet apart from each other when possible</li>
                    <li>One person at a time inside of the office</li>
                    <li>No appointments necessary!</li>
                </ul>
            </div>
        </div>

        <div class="row homepage">
            <div class="col-xs-12 col-lg-6 homepage-section homepage-banner">
                <img class="banner" src="images/front-door.webp" alt="The front door of RS Insurance Services">
            </div>
            <div class="col-xs-12 col-lg-6 homepage-section homepage-services">
                <h2 class="homepage-header">RS Insurance Services</h2>
                    <p>Serving the community since 2007.</p>
                <h2 class="homepage-header"><i class="fas fa-handshake">&nbsp;</i>Our services</h2>
                <ul class="homepage-services-list">
                    <li class="homepage-services-item">Automobile, motorcycle, and commercial vehicle insurance</li>
                    <li class="homepage-services-item">We offer both full coverage and liability coverage</li>
                    <li class="homepage-services-item">Suspended license? No problem!</li>
                </ul>

                <h2 class="homepage-header"><i class="far fa-question-circle">&nbsp;</i>Why choose us?</h2>
                <ul class="homepage-choices-list">
                    <li class="homepage-choice-item">We are a family-owned business that has been insuring the North Texas community for over ten years.</li>
                    <li class="homepage-choice-item">We are determined to make car insurance easy for you to understand</li>
                    <li class="homepage-choice-item">We are open during the evenings for your convenience!</li>
                    <li class="homepage-choice-item">Hablamos español!</li>
                </ul>

                <h2 class="homepage-header">We look forward to insuring you and your loved ones.</h2>
                <p>Call or visit us today!</p>
            </div>
            <div class="col-xs-12 homepage-section homepage-contact-info alt-color">
                <h2 class="homepage-header">Contact us!</h2>
                <p><i class="far fa-clock">&nbsp;</i>Business hours:<br>Monday and Thursday: 9am - 6pm<br>Tuesday, Wednesday, Friday, and Saturday: 9am - 7pm<br>Closed on Sundays</p>
                <p><i class="fas fa-phone-alt">&nbsp;</i>Phone number:<br>(972)-237-1431</p>
                <p><i class="fas fa-map-marked-alt">&nbsp;</i>Address:<br>301 SE 14th Street, Grand Prairie, TX 75051</p>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13423.370664684846!2d-96.9880409!3d32.7433682!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xab5e868ab8cc8d24!2sRS%20Insurance%20Services!5e0!3m2!1sen!2sus!4v1605569844220!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</main>

<?php
    include_once("components/inc.footer.php");
?>
