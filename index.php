<?php
include 'conexion.php';

$sql = "SELECT * FROM articulos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Artículos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="contenedor">

    <h1>📦 Gestión de Artículos</h1>

    <form action="guardar.php" method="POST" class="formulario">

        <input type="text" name="nombre" placeholder="Nombre del artículo" required>

        <input type="text" name="marca" placeholder="Marca" required>

        <input type="number" name="cantidad" placeholder="Cantidad" required>

        <input type="text" name="bodega" placeholder="Bodega" required>

        <button type="submit" class="btn guardar">Guardar</button>

    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Cantidad</th>
            <th>Bodega</th>
            <th>Acciones</th>
        </tr>

        <?php while($fila = $resultado->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['marca']; ?></td>
            <td><?php echo $fila['cantidad']; ?></td>
            <td><?php echo $fila['bodega']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn editar">Editar</a>

                <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn eliminar" onclick="return confirm('¿Desea eliminar este artículo?')">Eliminar</a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>