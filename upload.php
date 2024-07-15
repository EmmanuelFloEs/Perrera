<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen']['name'];
    $target = "uploads/" . basename($imagen);

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target)) {
        $sql = "INSERT INTO animales (nombre, descripcion, imagen) VALUES ('$nombre', '$descripcion', '$imagen')";
        if ($conn->query($sql) === TRUE) {
            echo "Agregado exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poner en Adopcion</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br>
        <h1 class="text-center">Poner en Adopcion</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-success">Subir</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
            <a href="editarbut.php" class="btn btn-secondary">Editar</a>
        </form>
        <br>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
