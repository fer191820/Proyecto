<?php
// Incluir el archivo de conexión
include 'conexionBD.php';

// Definir el valor de asistencia que se quiere insertar
$asistencia = 1; // Puedes cambiar este valor según la lógica de tu aplicación

// Verificar que el valor de asistencia no sea NULL o vacío
if (!is_null($asistencia) && $asistencia !== '') {
    // Consulta para insertar los datos
    $sql = "INSERT INTO asistencia (asistencia, fecha, hora) VALUES ($asistencia, CURDATE(), CURTIME())";
    
    // Ejecutar la consulta y comprobar si se realizó correctamente
    if ($conn->query($sql) === TRUE) {
        $registro_completado = true; // Indica que el registro se completó
    } else {
        echo "Error al insertar: " . $conn->error; // Mostrar error si hay un problema
    }
} else {
    echo "El valor de asistencia no puede ser nulo.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Asistencia</title>
    <link rel="stylesheet" href="../css/msj.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo.png" alt="Logo USM">
        </div>
    </header>

    <dialog open id="mensaje">
        <h1>Registro de asistencia completado</h1>
        <p>- Puede cerrar este apartado </p>
    </dialog>
</body>
</html>
<?php
// Cerrar la conexión
$conn->close();
?>





