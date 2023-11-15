<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtCategoria"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtProveedores"]) || empty($_POST["txtFechaIngreso"]) || empty($_POST["txtProductosAlm"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $categoria = $_POST["txtCategoria"];
    $precio = $_POST["txtPrecio"];
    $proveedores = $_POST["txtProveedores"];
    $fechaIngreso = $_POST["txtFechaIngreso"];
    $productosAlm = $_POST["txtProductosAlm"];
    
    $sentencia = $bd->prepare("INSERT INTO producto(nombre,descripcion,categoria,precio,proveedores,fechaIngreso,productosAlm) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$descripcion,$categoria,$precio,$proveedores,$fechaIngreso,$productosAlm]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>