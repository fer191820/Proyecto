<?php
// Incluir el archivo de conexión
include 'conexionBD.php';

// Consulta para obtener los datos
$sql = "SELECT fecha, SUM(asistencia) AS total_asistencia FROM asistencia GROUP BY fecha";
$result = $conn->query($sql);
// Crear la tabla HTML
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <link rel="stylesheet" href="../css/tabla.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="../img/logo.png" alt="Logo"> 
        </div>
        <div class="opciones">
           <a href="">cerrar sesion</a>
        </div>
    </header>
<h2>Registro de Asistencia</h2>
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Asistencia</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody> <!-- Abrir tbody -->
        <?php
        // Mostrar los datos
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['total_asistencia'] . "</td>
                        <td>" . $row['fecha'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
        }
        ?>
        </tbody> <!-- Cerrar tbody -->
    </table>
</div>
</body>
</html>
<?php
// Cerrar la conexión$conn->close();
?>