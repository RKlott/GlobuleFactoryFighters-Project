<?php
require_once dirname(__DIR__, 2) . '/config.php';
//back-end utilities
$db_file_path = "../../admin/includes/db.php";
$functions_file_path = "../../admin/includes/functions.php";

//front-end utilities
//? <head>
$page_name = "Contact";
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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require "../../vendor/autoload.php"; // Charger PHPMailer via Composer //? Modifier ce chemin manuellement en production

// Charge les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__ . "/../../"); // __DIR__ pour être sûr que c'est bien dans le bon répertoire
$dotenv->load();

if (isset($_POST["submit"])) {
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $prenom = htmlspecialchars(trim($_POST["prenom"]));
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $telephone = htmlspecialchars(trim($_POST["telephone"]));
    $objet = htmlspecialchars(trim($_POST["objet"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $acceptation = isset($_POST["acceptation"]) ? true : false;
    $errors = [];

    if (empty($nom)) $errors[] = "Le nom est requis.";
    if (empty($prenom)) $errors[] = "Le prénom est requis.";
    if (!$email) $errors[] = "L'email est invalide.";
    if (empty($objet)) $errors[] = "L'objet est requis.";
    if (!$acceptation) $errors[] = "Vous devez accepter les conditions.";

    if (empty($errors)) {
        $mail = new PHPMailer(true);
        
        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = getenv('SMTP_HOST'); // Serveur SMTP (ex: smtp.gmail.com, smtp.office365.com)
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USERNAME'); // Remplace par ton email
            $mail->Password = getenv('SMTP_PASSWORD'); // Remplace par ton mot de passe ou un mot de passe d’application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587; // Port SMTP (587 pour TLS, 465 pour SSL)

            // Expéditeur et destinataire
            $mail->setFrom(getenv('SMTP_USERNAME'), "$nom $prenom");
            $mail->addAddress(getenv('SMTP_RECEIVING_ADDRESS')); // Remplace par ton email de réception
            $mail->addReplyTo($email, "$prenom $nom"); // L'email saisi par l'utilisateur est ici

            // Contenu du mail
            $mail->isHTML(false);
            $mail->Subject = "[$objet] Nouveau message de contact";
            $mail->Body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\nTéléphone: $telephone\nObjet: $objet\n\nMessage:\n$message";

            $mail->send();
            echo "<p style='color:green;'>Votre message a bien été envoyé !</p>";
        } catch (Exception $e) {
            echo "<p style='color:red;'>Erreur lors de l'envoi du message : {$mail->ErrorInfo}</p>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}

?>

<main class="index_contact">
    <section class="index_header">
        <div class="index_header_title_container">
            <h3 class="underline-effect">CONTACT</h3>
            <h4>Contactez-nous !</h4>
        </div>

        <div class="index_team_description">
            <img src="../assets/images/gff-logo.png" alt="logo du club" id="logo_index_contact">
            <p>HORAIRES D'ACCUEIL <br>
                Lundi au Vendredi 09h - 20h
            </p>
        </div>
    </section>

    <section class="contact_infos">
        <h2>INFORMATIONS</h2>
        <div><img src="../assets/images/contact-imgs/phone.png" alt="icone telephone"> 00.00.00.00.00</div>
        <div><img src="../assets/images/contact-imgs/envelop.png" alt="icone email">mail@exemple.com</div>
        <div><img src="../assets/images/contact-imgs/signpost.png" alt="icone direction">Globule Fitness, 4 Bis, Place Kennedy, 33210, Langon</div>
    </section>

    <section class="contact_us">
        <div class="contact_form_container">
            <h2>ENVOYEZ-NOUS UN MESSAGE</h2>
            <form method="POST" action="">
                <div class="line_form">
                    <div>
                        <label for="nom">Nom* :</label>
                        <input type="text" name="nom" id="nom" required>
                    </div>

                    <div class="prenom">
                        <label for="prenom">Prénom* :</label>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>

                </div>

                <label for="email">Email* :</label>
                <input type="email" name="email" id="email" required>

                <label for="telephone">Téléphone :</label>
                <input type="tel" name="telephone" id="telephone">

                <label for="objet">Objet* :</label>
                <input type="text" name="objet" id="objet" required>

                <label for="message">Message :</label>
                <textarea name="message" id="message" rows="5"></textarea>

                <label class="container">
                    <input type="checkbox" name="acceptation" required>
                    <span class="checkmark"></span>
                    J'accepte que mes informations soient utilisées pour être recontacté(e).
                </label>

                <button type="submit" name="submit"><img src="../assets/images/contact-imgs/send.png" alt="icone d'envoi"></button>
            </form>
        </div>

        <div class="contact_find_us">
            <h2>où nous trouver</h2>
            <div id="map"></div>
        </div>
    </section>


</main>

<?php require './components/footer.php' ?>