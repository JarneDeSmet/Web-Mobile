<?php

// Show all errors (for educational purposes)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// Constanten (connectie-instellingen databank)
define('DB_HOST', 'localhost');
define('DB_USER', 'adamRl');
define('DB_PASS', 'P3l4a1i_');
define('DB_NAME', 'contact.adam');

date_default_timezone_set('Europe/Brussels');

// Verbinding maken met de databank
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindingsfout: ' . $e->getMessage();
    exit;
}

$name = isset($_POST['name']) ? (string)$_POST['name'] : '';
$message = isset($_POST['message']) ? (string)$_POST['message'] : '';
$msgName = '';
$msgMessage = '';

// form is sent: perform formchecking!
if (isset($_POST['btnSubmit'])) {

    $allOk = true;

    // name not empty
    if (trim($name) === '') {
        $msgName = 'Gelieve een naam in te voeren';
        $allOk = false;
    }

    if (trim($message) === '') {
        $msgMessage = 'Gelieve een boodschap in te voeren';
        $allOk = false;
    }

    // end of form check. If $allOk still is true, then the form was sent in correctly
    if ($allOk) {
        $stmt = $db->exec('INSERT INTO messages (sender, message, added_on) VALUES (\'' . $name . '\',\'' . $message . '\',\'' . (new DateTime())->format('Y-m-d H:i:s') . '\')');

        // the query succeeded, redirect to this very same page
        if ($db->lastInsertId() !== 0) {
            header('Location: formchecking_thanks.php?name=' . urlencode($name));
            exit();
        } // the query failed
        else {
            echo 'Databankfout.';
            exit;
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="style.css">
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
<main class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>Contact</h1>
        <p class="message">Wenst u ons te contacteren ? Gelieve de contactform in te vullen.</p>

        <div>
            <label for="name">Naam</label>
            <input placeholder="Balthazar Boma" type="text" id="name" name="name" value="<?php echo $name; ?>" class="input-text"/>
            <span class="message error"><?php echo $msgName; ?></span>
        </div>
        <div>
            <label for="message">Boodschap</label>
            <textarea placeholder="Ik houd van vlees" name="message" id="message" rows="5" cols="40"><?php echo $message; ?></textarea>
            <span class="message error"><?php echo $msgMessage; ?></span>
        </div>


        <input type="submit" id="btnSubmit" name="btnSubmit" value="Verstuur"/>
    </form>
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
