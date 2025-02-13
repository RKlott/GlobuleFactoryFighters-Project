<!-- Gestion de l'authentification -->
<?php
session_start();
require './includes/db.php';

$pdo = db::getInstance();

var_dump($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: ./index.php');
        exit;
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/sass/admin.css">
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
</head>

<body class="login_body">
    <main class="login_main">
        <section class="login_section">
            <div class="login_header">
                <h1 id="login_form_title">PANEL ADMINISTRATEUR<br>GLOBULE FACTORY FIGHTERS</h1>
                <img src="./assets/img/GFF_high_quality_transparent.png" alt="logo_team">
            </div>

            <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>

            <form method="post" class="login_form">
                <label class="login_label">Nom d'utilisateur</label>
                <input type="text" name="username" class="login_input" required>

                <label class="login_label">Mot de passe</label>
                <input type="password" name="password" class="login_input" required>

                <button class="login_submit_button" type="submit">CONNEXION</button>
            </form>
        </section>
    </main>



</body>

</html>