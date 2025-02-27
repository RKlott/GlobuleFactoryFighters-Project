<?php
//back-end utilities
$db_file_path = "../../admin/includes/db.php";
$functions_file_path = "../../admin/includes/functions.php";

//front-end utilities
//? <head>
$page_name = "Team";
$css_file_path = "../assets/sass/main.css";

//? <body>
$navbar_logo_href_path = "../index.php";
$navbar_logo_img = "../assets/images/gff-logo.png";
$index_page_path = "../index.php";
$discipline_page_path = "./disciplines.php";
$planning_page_path = "./planning.php";
$team_page_path = "./team.php";
$sponsors_page_path = "./tarifs.php";
$contact_page_path = "./contact.php";

//? <footer>
$footer_logo = "../assets/images/gff-logo.png";

//*js utilities
$js_index_file_path = "../assets/js/index.js";

//////

require "./components/header.php";
require_once dirname(__DIR__, 2) . '/config.php';

$pdo = db::getInstance();
$competitors = getCompetitors($pdo);
?>

<main class="team_main">
    <section class="index_header">
        <div class="index_header_title_container">
            <h3 class="underline-effect">LA TEAM</h3>
        </div>
    </section>

    <section class="team_coach">
        <h2>NOS COACHS</h2>
        <div class="mma_coach">
            <img src="../assets/images/team-imgs/lucas.jpeg" alt="">
            <span>
                <h3>Frédéric Pietrzak</h3>
                <h4>MMA COACH</h4>
            </span>
        </div>

        <div class="kickboxing_coach">
            <img src="../assets/images/team-imgs/sacha.jpeg" alt="">
            <span>
                <h3>Cyril Dubourdieu</h3>
                <h4>KICKBOXING COACH</h4>
            </span>
        </div>

        <span class="team_coach_story">
            <p>
                Nos coachs de MMA et de Kickboxing sont de véritables experts dans leurs disciplines, chacun fort d’une expérience solide acquise au fil des années, aussi bien sur les tatamis qu’en combat. <br><br>
                Leur savoir-faire technique et leur pédagogie exceptionnelle leur permettent d’accompagner aussi bien les pratiquants loisirs que les combattants confirmés, quel que soit leur niveau de départ, ou leur niveau de compétition. <br><br>
                Que vous cherchiez à pratiquer pour le plaisir, à vous dépasser physiquement et mentalement, ou à briller dans le ring ou dans la cage, nos coachs sont là pour vous guider. <br><br>
                Grâce à un encadrement de haut niveau, vous pourrez progresser à votre rythme et, si vous le souhaitez, évoluer vers la compétition et la performance avec un suivi adapté et rigoureux. <br><br>
                Rejoignez une équipe où passion, excellence et dépassement de soi sont les maîtres mots, et laissez nos coachs vous accompagner vers vos objectifs !
            </p>
        </span>
    </section>

    <section class="team_competitor">
        <div class="competitor-container">
            <?php foreach ($competitors as $competitor): ?>
                <div class="competitor-card">
                <img src="<?= BASE_URL . htmlspecialchars($competitor['photo_path']) ?>" 
                alt="Photo de <?= htmlspecialchars($competitor['first_name'])?> <?= htmlspecialchars($competitor['last_name'])?>">
                    <h3><?= htmlspecialchars($competitor['first_name'] . ' ' . $competitor['last_name']) ?></h3>
                    <p><strong>Discipline:</strong> <?= htmlspecialchars($competitor['discipline']) ?></p>
                    <p><strong><?= htmlspecialchars($competitor['status']) ?></strong></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require './components/footer.php' ?>;