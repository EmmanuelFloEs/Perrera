<?php
include 'conexion.php';

$sql = "SELECT * FROM animales";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .container {
            max-width: 1200px;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .actions a {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1>Editar</h1>
            <a href="upload.php" class="btn btn-success">Regresar</a>
        </div>
        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="uploads/<?php echo $row['imagen']; ?>" class="card-img-top" alt="<?php echo $row['nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                        <p class="card-text"><?php echo $row['descripcion']; ?></p>
                        <div class="actions">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
