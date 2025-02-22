<?php
//back-end utilities
$db_file_path = "../../admin/includes/db.php";
$functions_file_path = "../../admin/includes/functions.php";

//front-end utilities
//? <head>
$page_name = "Planning";
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

require "./components/header.php";

$pdo = db::getInstance();
// Récupérer l'image du planning depuis la base de données
$stmt = $pdo->query("SELECT image_path FROM schedule WHERE id = 1");
$schedule = $stmt->fetch(PDO::FETCH_ASSOC);

//Génération dynamique de l'URL de l'image
$baseUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME'], 2);
$imagePath = $baseUrl . "/assets/uploads/schedule/" . htmlspecialchars($schedule['image_path']);

?>

<main>
<section class="index_header">
        <div class="index_header_title_container">
            <h3 class="underline-effect">PLANNING</h3>
        </div>

<div class="planning-container">
    <?php if ($schedule && !empty($schedule['image_path'])): ?>
        <img src="<?= $imagePath ?>" alt="Planning des entraînements" class="planning-image">

    <?php else: ?>
        <p>Aucun planning disponible pour le moment.</p>
    <?php endif; ?>
</div>
</main>

<?php require './components/footer.php' ?>