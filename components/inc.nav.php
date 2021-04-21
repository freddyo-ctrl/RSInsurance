<nav>
    <a href="index.php"><img src="images/logo.webp" width="223" height="120" alt="RS Insurance Services logo"></a>
    <button class="navbar-toggler" data-target="#mainNavigation" type="button" aria-label="Toggle navigation menu"><i class="far fa-bars"></i></button>

    <div class="collapse navbar-collapse" id="mainNavigation">
        <ul class="centered-text navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="policies.php">Policies</a>
            </li>
            <li class="nav-item">
                <?php 
                    if(isset($_COOKIE["username"]) && !empty($_COOKIE["username"])) {
                        echo "<a class=\"nav-link\" href=\"manage-quotes.php\">Manage quotes</a>";
                    }
                    else {
                        echo "<a class=\"nav-link\" href=\"request-quote.php\">Request a quote</a>";
                    }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="partners.php">Partners</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="faq.php">FAQs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
            </li>
            <li class="nav-item">
                <?php 
                    if(!isset($_COOKIE["username"]) && empty($_COOKIE["username"])) {
                        echo "<a class=\"nav-link\" href=\"login.php\">Log in</a>";
                    }
                    else {
                        echo "<a class=\"nav-link\" href=\"logout.php\">Log out</a>";
                    }
                ?>
            </li>
        </ul>
    </div>
</nav>
