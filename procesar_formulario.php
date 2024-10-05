<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario y limpiar los inputs
    $nombre = htmlspecialchars(trim($_POST['name']));
    $correo = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['message']));

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
        // Configurar el correo
        $to = "tucorreo@example.com"; // Reemplaza con tu dirección de correo electrónico
        $subject = "Nuevo mensaje de contacto de $nombre";
        $body = "Nombre: $nombre\nCorreo: $correo\nMensaje: $mensaje\n";
        $headers = "From: $correo\r\n"; // El correo del remitente

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Gracias por tu mensaje</title>
                <link rel='stylesheet' href='styles.css'>
            </head>
            <body>
                <header>
                    <h1>Servicio Técnico Jarochito</h1>
                    <nav>
                        <ul>
                            <li><a href='index2.0.html'>Inicio</a></li>
                            <li><a href='index2.1.html'>Servicios</a></li>
                            <li><a href='index2.2.html'>Promociones</a></li>
                            <li><a href='index2.3.html'>Contacto</a></li>
                        </ul>
                    </nav>
                </header>
                <main>
                    <h2>Gracias, $nombre</h2>
                    <p>Hemos recibido tu mensaje:</p>
                    <blockquote>$mensaje</blockquote>
                    <p>Nos pondremos en contacto contigo a través de $correo.</p>
                </main>
                <footer>
                    <p>&copy; 2024 Servicio Técnico Jarochito. Todos los derechos reservados.</p>
                </footer>
            </body>
            </html>";
        } else {
            echo "<p>Error al enviar el mensaje. Intenta nuevamente más tarde.</p>";
        }
    } else {
        echo "<p>Por favor, completa todos los campos.</p>";
    }
} else {
    echo "<p>Método no permitido.</p>";
}
?>
