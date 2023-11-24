<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de boletos: Teatro</title>
    <link rel="shortcut icon" href="../Resource/Logo.png">
    <link rel="stylesheet" href="../css/tabla.css">
    <!-- <link rel="stylesheet" href="../css/style_boleto.css"> -->
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

<?php
// Configura la conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketmaster";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los registros de la tabla obrasteatro
$sql = "SELECT * FROM obrasteatro";
$result = $conn->query($sql);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    ?>
    <h2 class="mt-3">Tabla de Obras de Teatro</h2>
    <div class="table-container">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-primary">
                <tr class>
                    <th>ID</th>
                    <th>Teatro</th>
                    <th>Obra</th>
                    <th>Horario</th>
                    <th>Días Laborales</th>
                    <th>Días Festivos</th>
                    <th>Precio Luneta</th>
                    <th>Precio Palco</th>
                    <th>Capacidad Máxima</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Imprime los datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["teatro"]."</td>";
                    echo "<td>".$row["obra"]."</td>";
                    echo "<td>".$row["horario"]."</td>";
                    echo "<td>".$row["diasLaborales"]."</td>";
                    echo "<td>".$row["diasFestivos"]."</td>";
                    echo "<td>".$row["precioLuneta"]."</td>";
                    echo "<td>".$row["precioPalco"]."</td>";
                    echo "<td>".$row["capacidadMaxima"]."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
}
else {
    echo "No se encontraron resultados.";
}

// Cierra la conexión
$conn->close();
?>
    <script src="../js/script.js"></script>
</body>
</html>
