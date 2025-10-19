<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST["telefono"]);
    $direccion = htmlspecialchars($_POST["direccion"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    $to = "green@ecosteamclean.nl";  // Cambia esto por tu dirección de correo
    $subject = "New Cleaning Quote Request";
    $body = "Name: $nombre\n".
            "Email: $email\n".
            "Phone: $telefono\n".
            "Address: $direccion\n".
            "Message:\n$mensaje";
    
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Your request has been sent successfully!";
    } else {
        echo "Error sending the request. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>



