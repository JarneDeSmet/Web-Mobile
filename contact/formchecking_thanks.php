<?php

$name = isset($_GET['name']) ? $_GET['name'] : false;
$age = isset($_GET['age']) ? $_GET['age'] : false;

?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Testform</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
<header>
    <div class="container">
        <a href="../"><img src="../images/header/logo.png" alt="logo van OdiseeEats" class="logo"></a>
        <nav>
            <ul>
                <li>
                    <a class="navlink" href="../">Home</a>
                </li>
                <li><a class="navlink" href="../producten">Producten</a>
                </li>
                <li>
                    <a class=" navlink" href="../about">Over ons</a>
                </li>
                <li>
                    <a class="navlink current" href="../contact">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <?php

    // Name sent in
    if ($name) {
        echo '<p class="thankYou">Thank you ' . htmlentities($name) . '</p>';
    } // Age sent in
    else if ($age) {
        echo '<p class="thankYou">Thank you, ' . htmlentities($age) . ' year old stranger</p>';
    } // Nothing sent in
    else {
        echo '<p class="thankYou">Thank you, stranger</p>';
    }

    ?>

    <div id="debug">

        <?php

        /**
         * Helper Functions
         * ========================
         */

        /**
         * Dumps a variable
         * @param mixed $var
         * @return void
         */
        function dump($var)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }


        /**
         * Main Program Code
         * ========================
         */

        // dump $_GET
        dump($_GET);

        ?>

    </div>
</main>
<footer>
    <div class="container">
        &copy; Copyright 2021, OdiseeEats
        <div id="socials">
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://jarnedesmet.github.io/Web-Mobile/"> <img
                        src="../images/footer/facebook.png" alt="facebook logo"></a>
            <a href="https://twitter.com/"> <img src="../images/footer/twitter.png" alt="twitter logo"></a>
            <a href="https://www.instagram.com/"> <img src="../images/footer/instagram.png" alt="instagram logo"></a>
        </div>
        Gebroeders de Smetstraat 1, 9000 Gent
    </div>

</footer>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>
    //Get the button
    const mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script>
    let supports3DTransforms = document.body.style['webkitPerspective'] !== undefined ||
        document.body.style['MozPerspective'] !== undefined;

    function linkify(selector) {
        if (supports3DTransforms) {

            let nodes = document.querySelectorAll(selector);

            let i = 0, len = nodes.length;
            for (; i < len; i++) {
                let node = nodes[i];

                if (!node.className || !node.className.match(/roll/g)) {
                    node.className += ' roll';
                    node.innerHTML = '<span data-title="' + node.text + '">' + node.innerHTML + '</span>';
                }
            }
        }
    }

    linkify('.navlink');
</script>
</body>
</html>