<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $categoria = $_POST['txtCategoria'];
    $precio = $_POST['txtPrecio'];
    $proveedores = $_POST['txtProveedores'];
    $fechaIngreso = $_POST['txtFechaIngreso'];
    $productosAlm = $_POST['txtProductosAlm'];

    $sentencia = $bd->prepare("UPDATE producto SET nombre = ?, descripcion = ?, categoria = ?, precio = ?, proveedores = ?, fechaIngreso = ?, productosAlm = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $descripcion, $categoria, $precio, $proveedores, $fechaIngreso,$productosAlm, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>