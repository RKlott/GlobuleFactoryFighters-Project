<?php
//back-end utilities
$db_file_path = "../../admin/includes/db.php";
$functions_file_path = "../../admin/includes/functions.php";

//front-end utilities
//? <head>
$page_name = "Disciplines";
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

<main class="discip_main">
    <section class="index_header">
        <div class="index_header_title_container">
            <h3 class="underline-effect">DISCIPLINES</h3>
            <h4>Les disciplines dispensées au sein du club</h4>
        </div>
    </section>

    <section class="discip_section">
        <div class="discip_container">
            <div class="discip_mma">
                <h2>MMA (Mixed Martial Arts)</h2>
                <div class="discip-group">
                    <div class="discip-txt-box">
                        <div class="info-div">
                            <img src="../assets/images/disciplines-img/info-bubble.png" alt="Image bulle d'information">
                            <div class="sub-txt">
                                <span class="white-underline-effect">Les cours collectifs sont accessible à partir de 15 ans !</span> <br>
                                <br>
                                Les cours compétiteurs sont uniquement accessibles sur autorisation du coach !
                            </div>
                        </div>

                        <div class="discip_mma_txt">
                            Le MMA (Mixed Martial Arts) est bien plus qu’un sport de combat, c’est une discipline qui incarne des valeurs fortes telles que le respect, la persévérance et la maîtrise de soi. <br>
                            <br>
                            En combinant des techniques variées issues de disciplines comme la boxe, le kick-boxing, le jiu-jitsu, la lutte et le muay-thaï, le MMA offre une richesse et une diversité qui en font un véritable art martial moderne. <br>
                            <br>
                            S’entraîner au MMA, c’est développer sa condition physique, sa confiance en soi et sa résilience mentale, tout en apprenant à se dépasser. <br>
                            <br>
                            Que vous soyez débutant ou compétiteur aguerri, nos entraînements sont conçus pour s’adapter à tous les niveaux. <br>
                            <br>
                            Chacun peut y trouver un défi à sa mesure et évoluer dans une ambiance conviviale et motivante. <br>
                            <br>
                            Rejoignez-nous et découvrez un sport où technique, stratégie et esprit d’équipe se rencontrent pour révéler le meilleur de vous-même !
                        </div>
                    </div>

                    <span class="discip_img_container">
                        <img src="../assets/images/disciplines-img/img_mma.png" alt="">
                    </span>
                </div>
            </div>

            <div class="discip_kick">
            <h2>Kickboxing/K1</h2>
                <div class="discip-group">
                    <span class="discip_img_container">
                        <img src="../assets/images/disciplines-img/img_kick.png" alt="">
                    </span>

                    <div class="discip-txt-box">
                        <div class="info-div">
                            <img src="../assets/images/disciplines-img/info-bubble.png" alt="Image bulle d'information">
                            <div class="sub-txt">
                                <span class="white-underline-effect">Les cours collectifs sont accessible à partir de 15 ans !</span> <br>
                                <br>
                                Les cours compétiteurs sont uniquement accessibles sur autorisation du coach !
                            </div>
                        </div>

                        <div class="discip_mma_txt">
                        Le Kickboxing est une discipline dynamique et accessible qui combine puissance, agilité et précision. <br>
                        <br>
                        Inspiré des sports de combat pieds-poings comme la boxe anglaise et le karaté, le Kickboxing se distingue par sa fluidité et son intensité, en faisant une pratique aussi complète qu’exigeante. <br>
                        <br>
                        S’entraîner au Kickboxing, c’est bien plus que perfectionner ses coups. C’est développer sa force, son endurance et sa coordination, tout en cultivant des valeurs essentielles telles que le respect, la discipline et la confiance en soi. <br>
                        <br>
                        Que vous soyez là pour le plaisir, pour vous défouler ou pour préparer des compétitions, nos séances s’adaptent à tous les niveaux. <br>
                        <br>
                        Entraînez-vous dans une ambiance motivante et bienveillante, où chacun peut progresser à son rythme tout en relevant de nouveaux défis. <br>
                        <br>
                        Rejoignez-nous et découvrez un sport qui allie technique, performance et esprit de dépassement !
                        </div>
                    </div>


                </div>
            </div>


        </div>


    </section>
</main>

<?php require './components/footer.php' ?>