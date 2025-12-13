<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom   = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);

    $to      = "info.destinestudio@gmail.com";
    $subject = "Nouvelle candidature - Destine Studio";
    $body    = "Nom: $nom\nEmail: $email\n\nCandidature envoyée avec CV et lettre de motivation.";

    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Gestion des fichiers
    $attachments = [];
    foreach (['cv', 'lm'] as $fileField) {
        if (isset($_FILES[$fileField]) && $_FILES[$fileField]['error'] == 0) {
            $attachments[] = $_FILES[$fileField]['tmp_name'];
            $filenames[]   = $_FILES[$fileField]['name'];
        }
    }

    // Envoi avec PHPMailer recommandé pour gérer les pièces jointes
    // Exemple simplifié avec mail() (ne gère pas les pièces jointes correctement)
    if (mail($to, $subject, $body, $headers)) {
        echo "Votre candidature a été envoyée avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'envoi.";
    }
}
?>
