<?php
include './includes/db.php'; // Inclure la configuration et la connexion à la base de données
include './includes/functions.php'; // Inclure les fonctions


session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ./login.php');
    exit;
}

if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time(); // Définit le timestamp de la dernière activité
} elseif (time() - $_SESSION['last_activity'] > 1800) { // 1800 secondes = 30 minutes
    session_unset(); // Supprime les variables de session
    session_destroy(); // Détruit la session
    header("Location: login.php");
    exit;
}
$_SESSION['last_activity'] = time();

$pdo = db::getInstance();

$welcome_message = "Bienvenue, " . strtoupper($_SESSION['admin_username']) . ".";

//*UPDATING SCHEDULE//////////////////////////////////
$message = ""; // Initialisation de la variable pour les messages
$upload_message = "";




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['schedule'])) {
    $uploadDir = "../public/assets/uploads/schedule/";
    uploadSchedule($_FILES['schedule'], $pdo, $uploadDir, $upload_message);
}

//*UPDATING MESSAGE LIST//////////////////////////////

$statusMessages = [];     // Tableau pour stocker les messages de succès/erreur

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['message'])) {
    $id = (int)$_POST['id'];              // ID du message
    $newMessage = trim($_POST['message']); // Nouveau contenu

    // Mise à jour du message
    $statusMessages[$id] = updateScrollingMessage($id, $newMessage, $pdo);
}

// Récupération des messages actuels
$messages = getScrollingMessages($pdo);

// Ajout d'un compétiteur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_competitor'])) {
    $statusMessage = addCompetitor($_POST, $pdo);
}

// Suppression d'un compétiteur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_competitor'])) {
    $id = (int)$_POST['id'];
    $statusMessage = deleteCompetitor($id, $pdo);
}

// Modification d'un compétiteur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_competitor'])) {
    $statusMessage = updateCompetitor($_POST, $pdo);
}

// Récupération des compétiteurs
$competitors = getCompetitors($pdo);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/sass/admin.css">
    <title>Gestion du Planning</title>
</head>

<body id="index_body">
    <main id="index_main">
        <header id="index_header">
            <span>Dashboard</span>
            <button>
                <a href="logout.php">Déconnexion</a>
            </button>
        </header>

        <section class="welcome_section">
            <h1><?= $welcome_message ?></h1>
            <h3>Panel d'administration du site Globule Factory Fighters.</h3>
        </section>



        <!-- Gestion des messages -->
        <section class="section_scrolling_messages">
            <h1>Gestion des messages défilants</h1>

            <?php foreach ($messages as $message) : ?>
                <div class="message-container">
                    <!-- Message de statut -->
                    <?php if (isset($statusMessages[$message['id']])) : ?>
                        <p class="<?= strpos($statusMessages[$message['id']], 'succès') !== false ? 'success' : 'error' ?> msg-success-validation">
                            <?= htmlspecialchars($statusMessages[$message['id']]) ?>
                        </p>
                    <?php endif; ?>
                    <!-- Afficher le message actuel -->
                    <div class="current-message">
                        Message actuel ( <?= $message['id'] ?> ) | " <?= htmlspecialchars($message['message']) ?> "
                    </div>

                    <!-- Formulaire de modification -->
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="<?= $message['id'] ?>">
                        <label for="message-<?= $message['id'] ?>">Nouveau message :</label><br>
                        <input type="text" id="message-<?= $message['id'] ?>" class="message-input" name="message"
                            value="<?= htmlspecialchars($message['message']) ?>" required>
                        <button type="submit" class="msg_submit_buttons"><i class="fa-solid fa-floppy-disk"></i></button>
                    </form>


                </div>
            <?php endforeach; ?>
        </section>

        <!-- Formulaire d'upload -->
        <section class="section_schedule_management">
            <h1>Gestion du planning</h1>
            <!-- Conteneur pour afficher les messages -->

            <?php if (!empty($upload_message)): ?>
                <div class="message <?= strpos($upload_message, 'succès') !== false ? 'success' : 'error' ?>">
                    <?= htmlspecialchars($upload_message) ?>
                </div>
            <?php endif; ?>

            <form action="index.php" method="post" enctype="multipart/form-data">
                <label for="schedule">Mettre à jour le planning :</label>
                <input type="file" name="schedule" id="schedule" class="file-input" required>
                <label for="schedule" class="file-label"><i class="fa-solid fa-floppy-disk fa-2xl"></i></label>
                <span class="file-name">Aucun fichier sélectionné</span>
                <button type="submit" class="file-button">Mettre à jour</button>
            </form>
        </section>


        <section class="section_competitor_management" id="section_competitor">
            <h1>Gestion des compétiteurs</h1>

            <!-- Affichage du message de statut -->
            <?php if (!empty($statusMessage)) : ?>
                <p class="<?= strpos($statusMessage, 'succès') !== false ? 'success' : 'error' ?>">
                    <?= htmlspecialchars($statusMessage) ?>
                </p>
            <?php endif; ?>

            <!-- Formulaire d'ajout de compétiteur -->
            <div class="add-competitor">
                <h2>Ajouter un compétiteur</h2>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <label>Nom :</label>
                    <input type="text" name="last_name" required>
                    <label>Prénom :</label>
                    <input type="text" name="first_name" required>
                    <label>Discipline :</label>
                    <input type="text" name="discipline" required>
                    <label>Statut :</label>
                    <select name="status">
                        <option value="Amateur">Amateur</option>
                        <option value="Pro">Pro</option>
                    </select>
                    <label>Photo :</label>
                    <input type="file" name="photo" class="input-competitor-img">
                    <button type="submit" name="add_competitor">Ajouter</button>
                </form>
            </div>

            <div class="list-competitor">
                <!-- Tableau des compétiteurs -->
                <h2>Liste des compétiteurs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Discipline</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($competitors as $competitor) : ?>
                            <tr>
                                <td><img src="<?= htmlspecialchars($competitor['photo_path']) ?>" alt="Photo"></td>
                                <td><?= htmlspecialchars($competitor['last_name']) ?></td>
                                <td><?= htmlspecialchars($competitor['first_name']) ?></td>
                                <td><?= htmlspecialchars($competitor['discipline']) ?></td>
                                <td><?= htmlspecialchars($competitor['status']) ?></td>
                                <td class="interaction-table-button">
                                    <form method="GET">
                                        <input type="hidden" name="edit" value="<?= $competitor['id'] ?>">
                                        <button type="submit"><i class="fa-solid fa-pen fa-xl"></i></button>
                                    </form>

                                    <form action="index.php" method="post">
                                        <input type="hidden" name="id" value="<?= $competitor['id'] ?>">
                                        <button type="submit" name="delete_competitor" onclick="return confirm('Supprimer ce compétiteur ?');"><i class="fa-solid fa-trash fa-xl"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Instance de modification des compétiteurs -->
            <?php
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];

                // Récupérer les infos du compétiteur
                $sql = "SELECT * FROM competitors WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $competitor = $stmt->fetch();

                if ($competitor):
            ?>
                    <div class="competitor-modify-management">
                        <h2>Modifier un compétiteur</h2>
                        <h3>Compétiteur sélectionné : <?= htmlspecialchars($competitor['last_name']) ?> <?= htmlspecialchars($competitor['first_name']) ?></h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $competitor['id'] ?>">

                            <label>Nom :</label>
                            <input type="text" name="last_name" value="<?= htmlspecialchars($competitor['last_name']) ?>" required>

                            <label>Prénom :</label>
                            <input type="text" name="first_name" value="<?= htmlspecialchars($competitor['first_name']) ?>" required>

                            <label>Discipline :</label>
                            <input type="text" name="discipline" value="<?= htmlspecialchars($competitor['discipline']) ?>" required>

                            <label>Statut :</label>
                            <select name="status">
                                <option value="Amateur" <?= $competitor['status'] === 'Amateur' ? 'selected' : '' ?>>Amateur</option>
                                <option value="Pro" <?= $competitor['status'] === 'Pro' ? 'selected' : '' ?>>Pro</option>
                            </select>

                            <label>Photo actuelle :</label><br>
                            <img src="<?= $competitor['photo_path'] ?>" width="100"><br>

                            <label class="new-photo">Nouvelle photo (facultatif) :</label>
                            <input type="file" name="photo">

                            <button type="submit" name="update_competitor">Mettre à jour</button>
                        </form>
                    </div>
            <?php
                endif;
            }
            ?>
        </section>

    </main>
    <script src="https://kit.fontawesome.com/c29a5d002d.js" crossorigin="anonymous"></script>
    <script src="./assets/js/admin.js" type="module"></script>
</body>

</html>