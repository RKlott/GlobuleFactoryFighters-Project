<!-- Fonctions communes pour gérer les messages, planning, et compétiteurs -->

<?php
/**
 * Fonction pour gérer l'upload d'un planning et mettre à jour la base de données.
 *
 * @param array $file L'array superglobal $_FILES pour le fichier uploadé.
 * @param PDO $pdo L'objet PDO pour la connexion à la base de données.
 * @param string $uploadDir Le chemin du dossier où stocker les fichiers uploadés.
 * @return string|null Un message de succès ou d'erreur, ou null si aucun fichier n'est traité.
 */
function uploadSchedule($file, PDO $pdo, $uploadDir, &$upload_message) {
    if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
        $upload_message = "Aucun fichier valide n'a été uploadé.";
        return false;
    }

    // Générer un nom de fichier unique
    $fileName = time() . "_" . basename($file['name']);
    $targetFilePath = $uploadDir . $fileName;

    // Déplacer le fichier vers le répertoire de destination
    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        try {
            // Mettre à jour l'entrée dans la base de données
            $sql = "UPDATE schedule SET image_path = ? WHERE id = 1"; // On suppose une seule entrée dans la table schedule
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$fileName]);

            $upload_message = "Planning mis à jour avec succès.";
            return true;
        } catch (PDOException $e) {
            $upload_message = "Erreur lors de la mise à jour de la base de données : " . $e->getMessage();
            return false;
        }
    } else {
        $upload_message = "Erreur lors du téléchargement du fichier.";
        return false;
    }
}


/**
 * Récupère tous les messages défilants de la base de données.
 *
 * @param PDO $pdo Instance de connexion PDO.
 * @return array Liste des messages.
 */
function getScrollingMessages(PDO $pdo)
{
    try {
        $sql = "SELECT * FROM scrolling_messages ORDER BY id ASC";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

/**
 * Met à jour un message spécifique dans la base de données.
 *
 * @param int $id L'ID du message à mettre à jour.
 * @param string $newMessage Le nouveau contenu du message.
 * @param PDO $pdo Instance de connexion PDO.
 * @return string Message de succès ou d'erreur.
 */
function updateScrollingMessage(int $id, string $newMessage, PDO $pdo)
{
    try {
        $sql = "UPDATE scrolling_messages SET message = :newMessage WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newMessage', $newMessage, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "Message $id mis à jour avec succès !";
        } else {
            return "Erreur lors de la mise à jour du message $id.";
        }
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

/**
 * Récupère tous les compétiteurs de la base de données.
 *
 * @param PDO $pdo Instance de connexion PDO.
 * @return array Liste des compétiteurs.
 */
function getCompetitors(PDO $pdo)
{
    try {
        $sql = "SELECT * FROM competitors ORDER BY id DESC";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

/**
 * Ajoute un compétiteur à la base de données.
 *
 * @param array $data Données du formulaire.
 * @param PDO $pdo Instance PDO.
 * @return string Message de retour (succès ou erreur).
 */
function addCompetitor(array $data, PDO $pdo) 
{
    try {
        // Charger la config pour BASE_URL
        require_once dirname(__DIR__, 2) . '/config.php';

        // Définir le chemin par défaut (sans "public/")
        $photoPath = 'assets/uploads/competitors/default.png';

        // Vérifier si une image a été uploadée
        if (!empty($_FILES['photo']['name'])) {
            $targetDir = dirname(__DIR__, 2) . '/public/assets/uploads/competitors/'; // Chemin serveur
            $fileName = time() . "_" . basename($_FILES['photo']['name']);
            $targetFilePath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
                $photoPath = 'assets/uploads/competitors/' . $fileName;
            } else {
                return "Erreur lors de l'upload de l'image.";
            }
        }

        // Insertion en base
        $sql = "INSERT INTO competitors (first_name, last_name, discipline, status, photo_path) 
                VALUES (:first_name, :last_name, :discipline, :status, :photo_path)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':discipline' => $data['discipline'],
            ':status' => $data['status'],
            ':photo_path' => $photoPath
        ]);

        return "Compétiteur ajouté avec succès !";
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}




/**
 * Supprime un compétiteur.
 *
 * @param int $id ID du compétiteur.
 * @param PDO $pdo Instance PDO.
 * @return string Message de retour.
 */
function deleteCompetitor(int $id, PDO $pdo)
{
    try {
        $stmt = $pdo->prepare("DELETE FROM competitors WHERE id = :id");
        $stmt->execute([':id' => $id]);

        return "Compétiteur supprimé avec succès !";
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

/**
 * Mise a jour d'un compétiteur
 *
 * @param array $data Données du formulaire.
 * @param PDO $pdo Instance PDO.
 * @return void
 */
function updateCompetitor(array $data, PDO $pdo) //TODO: J'ai modifié les chemins d'accès en rajoutant le "assets/", vérifier que ça ne fasse pas d'erreur de chemin d'upload
{
    try {
        $id = $data['id'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $discipline = $data['discipline'];
        $status = $data['status'];

        // Récupérer l'image actuelle
        $stmt = $pdo->prepare("SELECT photo_path FROM competitors WHERE id = ?");
        $stmt->execute([$id]);
        $competitor = $stmt->fetch();
        $photoPath = $competitor['photo_path']; // Garde l’ancienne image par défaut

        // Si une nouvelle photo est uploadée
        if (!empty($_FILES['photo']['name'])) {
            $targetDir = "../public/assets/uploads/competitors/";
            $fileName = time() . "_" . basename($_FILES['photo']['name']);
            $targetFilePath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
                $photoPath = "../public/assets/uploads/competitors/" . $fileName;
            }
        }

        // Mise à jour en base
        $sql = "UPDATE competitors 
                SET first_name = :first_name, last_name = :last_name, 
                    discipline = :discipline, status = :status, photo_path = :photo_path 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':discipline' => $discipline,
            ':status' => $status,
            ':photo_path' => $photoPath,
            ':id' => $id
        ]);
        return "Compétiteur mis à jour avec succès !";
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

?>

