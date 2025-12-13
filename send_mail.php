<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom       = htmlspecialchars($_POST['nom']);
    $email     = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $type      = htmlspecialchars($_POST['type']);
    $message   = htmlspecialchars($_POST['message']);

    $to      = "info.destinestudio@gmail.com";
    $subject = "Nouvelle demande de devis - Destine Studio";
    $body    = "Nom: $nom\nEmail: $email\nTéléphone: $telephone\nType de projet: $type\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Votre demande a été envoyée avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'envoi.";
    }
}
?>
