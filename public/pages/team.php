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

require "./components/header.php"
?>

<main>
    <section class="index_header">
        <div class="index_header_title_container">
            <h3 class="underline-effect">LA TEAM</h3>
        </div>
    </section>

    <section class="team_coach">
        <div class="mma_coach">
            <img src="" alt="">
            <span>
                <h3>Frédéric Pietrzak</h3>
                <h4>MMA COACH</h4>
            </span>
        </div>

        <div class="kickboxing_coach">
            <img src="" alt="">
            <span>
                <h3>Cyril Dubourdieu</h3>
                <h4>KICKBOXING COACH</h4>
            </span>
        </div>


    </section>
</main>

<?php require './components/footer.php' ?>;