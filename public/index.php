<?php
//back-end utilities
$db_file_path = "../admin/includes/db.php";
$functions_file_path = "../admin/includes/functions.php";

//front-end utilities
//? <head>
$page_name = "Accueil";
$css_file_path = "./assets/sass/main.css";

//? <body>
$navbar_logo_href_path = "./index.php";
$navbar_logo_img = "./assets/images/gff-logo.png";
$index_page_path = "./index.php";
$discipline_page_path = "./pages/disciplines.php";
$planning_page_path = "./pages/planning.php";
$team_page_path = "./pages/team.php";
$sponsors_page_path = "./pages/sponsors.php";
$contact_page_path = "./pages/contact.php";

//? <footer>
$footer_logo = "./assets/images/gff-logo.png";

//*js utilities
$js_index_file_path = "./assets/js/index.js";

require './pages/components/header.php';
?>

<main class="index_main">
    <p>CECI EST LE MAIN</p>
</main>

<?php require './pages/components/footer.php' ?>
