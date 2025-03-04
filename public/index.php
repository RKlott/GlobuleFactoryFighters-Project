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
$sponsors_page_path = "./pages/tarifs.php";
$contact_page_path = "./pages/contact.php";

//? <footer>
$footer_logo = "./assets/images/gff-logo.png";

//*js utilities
$js_index_file_path = "./assets/js/index.js";

require './pages/components/header.php';
?>

<!--//TODO: Corriger le menu burger, rajouter une croix pour le fermer, corriger le underline-effect qui affiche son element au dessus du menu, faire page contact-->

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

    <section class="index_discipline_info">
        <div>
            <img src="./assets/images/index-imgs/mma-illustrative-img.png" alt="image illustrative de la discipline mma">
            <p>Le MMA,<br>
                l'art du combat total,<br>
                combine techniques de boxe, lutte, jiu-jitsu<br>
                et bien plus encore.<br>
                Développez votre force, votre endurance<br>
                et votre stratégie<br>
                en maîtrisant tous les aspects<br>
                de ce sport de combat polyvalent et exigeant.</p>

            <button><a href="#">Lire plus...</a></button>
        </div>

        <div>
            <img src="./assets/images/index-imgs/kickboxing-illustrative-img.png" alt="image illustrative de la discipline kickboxing/k1">
            <p>Le kickboxing et sa variante le K1,<br>
                l'art du combat debout,<br>
                allie puissance,<br>
                vitesse et précision grâce à des techniques<br>
                de coups de poing, de pied, et de genoux.<br>
                Renforcez votre condition physique, votre agilité<br>
                et votre mental en explorant cette discipline<br>
                dynamique et spectaculaire,<br>
                exigeante que de maîtrise technique.</p>

            <button><a href="#">Lire plus...</a></button>
        </div>
    </section>

    <section class="index_team_softskills">
        <div>
            <img src="./assets/images/index-imgs/boxing-gloves-img.png" alt="Entraineurs experimente">
            <p>Entraîneurs Expérimentés</p>
        </div>

        <div>
            <img src="./assets/images/index-imgs/team-spirit-img.png" alt="esprit d'equipe">
            <p>Esprit d'équipe</p>
        </div>

        <div>
            <img src="./assets/images/index-imgs/success-img.png" alt="encadrement d'elite">
            <p>Encradrement d'Elite</p>
        </div>
    </section>

    <section class="index_discover_us">

        <div class="index_presentation">
            <img src="./assets/images/index-imgs/gff-discoverus-img.png" alt="image-decouvrez-nous">
            <span>
                <h2>Globule Factory Fighters,
                    <br>Découvrez-nous !
                </h2> <!--//TODO: Agrandir la taille des textes-->

                <p>Globule Factory Fighters est la Team de sports de combat
                    incontournable de Langon, offrant un enseignement d’élite
                    riche et complet en MMA et en Kickboxing/K1. <br><br>
                    Fondée en 2024 par Julien Bretou et Frederick Pietzrak,
                    notre team représente la section Combat de Globule Fitness,
                    proposant des cours adaptés à tous, accessible aussi bien
                    aux débutants qu’au confirmés, et aux compétiteurs amateurs
                    et professionnels, dispensées par des coachs expérimentés
                    et passionnés. <br><br>
                    Rejoignez-nous pour découvrir ou reprendre votre pratique des
                    sports de combat et atteindre vos objectifs personnels dans
                    un cadre autant familial que professionnel !</p>
            </span>
        </div>

        <div class="index_nos_installations">
            <h2 class="underline-effect">Nos Installations</h2> <!--//TODO: Augmenter la taille de "Nos Installations"-->
            <div>
                <span>
                    <h3>LA CAGE</h3> <!--//TODO: Agrandir la taille des textes-->
                    <p>Nous possédons à l’heure actuelle
                        la seule cage de MMA
                        en Sud-Gironde, idéale pour travailler
                        des thèmes précis axés
                        sur le contrôle et la gestion de la
                        distance en environnement délimité,
                        le travail de Lutte MMA (lutte contre
                        la cage), et pour la mise en situation
                        pour nos compétiteurs. <br>
                        <br>
                        Egalement utilisée lors des sessions
                        de cours privés de nos coachs,
                        elle reste disponible à l’utilisation sur
                        réservation à l’accueil de la salle à tout
                        nos adhérents !
                    </p>
                </span>

                <img src="./assets/images/index-imgs/cage-img.png" alt="la cage globule factory fighters">

            </div>
        </div>

        <div class="index_cross_training">
            <h3>ESPACE CROSS-TRAINING</h3>
            <div>
                <img src="./assets/images/index-imgs/crosstraining-1-img.png" alt="image une zone crosstraning globule fitness">
                <img src="./assets/images/index-imgs/crosstraining-2-img.png" alt="image deux zone crosstraining globule fitness">
                <img src="./assets/images/index-imgs/crosstraining-3-img.png" alt="image trois zone crosstraining globule fitness">
            </div>

            <p>Notre espace Cross-Training a été pensée pour vous permettre de vous entraîner au mieux
                et de vous surpasser physiquement, avec tout nos équipements et accessoires divers, vous
                pourrez préparer vos séances de renforcement/préparation physique dans des conditions optimales
                seul, ou accompagné de nos coachs spécialiste en conditionnement & préparation physique ! <br>
                <br>
                Les préparations physique de nos compétiteurs sont orchestrés dans toute notre infrastructure, <br>
                supervisées par notre Head-Coach et notre Préparateur physique dédié
            </p>
        </div>

        <div class="index_musculation">
            <h3>ESPACE MUSCULATION</h3>
            <div>
                <img src="./assets/images/index-imgs/muscu-1-img.png" alt="image une zone musculation globule fitness">
                <img src="./assets/images/index-imgs/muscu-2-img.png" alt="image deux zone musculation globule fitness">
            </div>

            <p>Découvrez un espace musculation pensé pour compléter votre pratique sportive générale. Doté d’équipements haut de gamme, cet espace vous permet de développer votre force, votre explosivité et votre endurance, des qualités essentielles pour performer et exceller. Accompagné par nos coachs expérimentés, vous bénéficierez de conseils adaptés à vos objectifs, que vous soyez compétiteur ou pratiquant passionné. Préparez-vous à repousser vos limites dans un cadre motivant et convivial !</p>
        </div>
    </section>

<!--//TODO: Faire une image des tarifs et simplement l'insérer dans une section ici-->




</main>

<?php require './pages/components/footer.php' ?>