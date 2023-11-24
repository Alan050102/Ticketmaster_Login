<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Boletos de Teatro</title>
    <link rel="shortcut icon" href="../Resource/Logo.png">
    <link rel="stylesheet" href="../css/style_boleto.css">
</head>
<body>
    <header>
        <a class="navbar-brand" href="../boletos.html">
            <img src="../Resource/Logo.png" width="45" height="40" alt="Ticketmaster Logo">
            Ticketmaster
        </a>
        <button class="navbar-toggler" id="navbar-toggler">
            ☰ <!-- Icono de hamburguesa -->
        </button>
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <div class="dropdown">
                    <a href="../Teatro/teatro.html" class="option-button">Teatro</a>
                    <div class="dropdown-content">
                        <a href="../Teatro/colon.html">Teatro Colón Buenos Aires</a>
                        <a href="../Teatro/scala.html">Teatro de la Scala Milán</a>
                        <a href="../Teatro/metropolitan.html">Teatro Metropólitan, Ciudad de México</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="../Cine/cine.html" class="option-button">Cine</a>
                    <div class="dropdown-content">
                        <a href="../Cine/cinemark.html">Cinemark</a>
                        <a href="../Cine/cinepolis.html">Cinépolis</a>
                        <a href="../Cine/cinemex.html">Cinemex</a>
                        <a href="../Cine/amc.html">AMC</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="../Museo/museo.html" class="option-button">Museo</a>
                    <div class="dropdown-content">
                        <a href="../Museo/lovre.html">Museo de Louvre París</a>
                        <a href="../Museo/metropolitano.html">Museo Metropolitano de Nueva York</a>
                        <a href="../Museo/vaticano.html">Museo Vaticano</a>
                        <a href="../Museo/antropologia.html">Museo Nacional de Antropología, Ciudad de México</a>
                        <a href="../Museo/catalunya.html">Museu Nacional d'Art de Catalunya</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="../index.html" class="option-button">Cerrar Sesion</a>
                </div>
            </div>
        </nav>
    </header>
    <h1>Ticket de compra</h1>
<?php
// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketmaster";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la información del formulario
    $cantidadBoletos = $_POST["cantidadBoletos"];
    $metodoPago = $_POST["metodoPago"];
    $museo = $_POST["museo"];

    // Consultar detalles de la obra desde la base de datos
    $sql = "SELECT * FROM museos WHERE museo = '$museo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Obtener información específica de la obra
        $museos = $row["museo"];
        $horarios = $row["horarios"];
        $capacidad = $row["capacidadMaxima"];
        $restricciones = $row["restricciones"];
        $precio = $row["precioBase"];

        $precioTotal = $precio * $cantidadBoletos;

        // Mostrar el resumen de la compra
    ?>
    <div class="container">
    
    <h2 class="centers">Resumen de Compra</h2>
    <?php
        echo "<p><strong>Museo Seleccionado:</strong> $museos</p>";
        echo "<p><strong>Horario:</strong> $horarios</p>";
        echo "<p><strong>Restricciones:</strong> $restricciones</p>";
        echo "<p><strong>Cantidad de Boletos:</strong> $cantidadBoletos</p>";
        echo "<p><strong>Método de Pago:</strong> $metodoPago</p>";
        echo "<p><strong>Monto Total:</strong> $$precioTotal</p>";
    } else {
        echo "Obra no encontrada";
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>