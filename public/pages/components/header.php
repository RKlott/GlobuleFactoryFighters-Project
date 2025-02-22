<?php
include $db_file_path;
include $functions_file_path;

$pdo = db::getInstance();
$messages = getScrollingMessages($pdo);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page_name ?></title>
    <link rel="stylesheet" href=<?=$css_file_path ?>>
</head>

<body>
    <header>
        <div class="info-bar">
            <span><p>Globule Factory Fighters</p></span>
            <div class="social-media-icon-infobar">

                <i class="fab fa-instagram fill-gradient-instagram fa-2x"></i>
                <i class="fa-brands fa-facebook fa-2x"></i>

            </div>
        </div>

        <div class="scrolling-messages" aria-live="polite"> <!--//TODO: La bande défilante montre en boucle le premier msg, corriger ça avec chatgpt-->
            <div class="messages-container">
                <?php foreach ($messages as $message) : ?>

                    <span class='message-line'><?= htmlspecialchars($message['message']) ?></span>

                <?php endforeach; ?>
            </div>
        </div>

        <nav class="navbar">
            <div class="logo"><a href=<?=$navbar_logo_href_path ?>><img src=<?=$navbar_logo_img?> alt="logo-du-club"></a></div>
            <div class="menu-toggle" id="mobile-menu"> <!--//TODO: changer ça avec une img de menu burger -->
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav-links">
                <li><a href=<?= $index_page_path?>>ACCUEIL</a></li>
                <li><a href=<?= $discipline_page_path?>>DISCIPLINES</a></li>
                <li><a href=<?= $planning_page_path?>>PLANNING</a></li>
                <li><a href=<?= $team_page_path?>>TEAM</a></li>
                <li><a href=<?= $sponsors_page_path?>>TARIFS</a></li>
                <li><a href=<?= $contact_page_path?>>CONTACT</a></li>
            </ul>
        </nav>
    </header>