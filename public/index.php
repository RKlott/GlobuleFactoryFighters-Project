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
    <section class="index_header">
        <div class="index_header_title_container">
            <h3 class="underline-effect">GLOBULE FACTORY FIGHTERS</h3>
            <h4>Plus qu'une team, une famille</h4>
        </div>

        <div class="index_team_description">
            <img src="./assets/images/gff-logo.png" alt="logo du club">
            <p>Nos cours sont accessible à tous niveaux de pratique dès 15 ans ! <br>
            Que vous n’aillez jamais pratiqué de sports de combat, ou que vous soyez <br>
            compétiteur débutant ou confirmé, nous saurons vous accompagner <br>
            vers vos objectifs.</p>
        </div>

    </section>




</main>

<?php require './pages/components/footer.php' ?>