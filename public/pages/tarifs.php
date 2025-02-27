<?php
//back-end utilities
$db_file_path = "../../admin/includes/db.php";
$functions_file_path = "../../admin/includes/functions.php";

//front-end utilities
//? <head>
$page_name = "Sponsors";
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

require "./components/header.php"
?>

<main>
    <section class="index_header">
        <div class="index_header_title_container">
            <h3 class="underline-effect">TARIFS</h3>
            <h4>Tarifs d'abonnements à la salle Globule Fitness</h4>
        </div>
    </section>

    <div class="tarif-container">
        <img class="tarif-img" src="../assets/images/tarifs-imgs/tarif-liberte.png" alt="Photo tarif liberté">
        <img class="tarif-img" src="../assets/images/tarifs-imgs/tarif-famille.png" alt="Photo tarif famille">
        <img class="tarif-img" src="../assets/images/tarifs-imgs/tarif-mineurs.png" alt="Photo de tarif mineurs">
    </div>


</main>

<?php require './components/footer.php' ?>