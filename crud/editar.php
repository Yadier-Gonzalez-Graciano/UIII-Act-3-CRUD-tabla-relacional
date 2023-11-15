<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from producto where codigo = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtDescripcion" autofocus required
                        value="<?php echo $persona->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria: </label>
                        <input type="text" class="form-control" name="txtCategoria" autofocus required
                        value="<?php echo $persona->categoria; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $persona->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proveedores: </label>
                        <input type="text" class="form-control" name="txtProveedores" autofocus required
                        value="<?php echo $persona->proveedores; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Ingreso: </label>
                        <input type="text" class="form-control" name="txtFechaIngreso" autofocus required
                        value="<?php echo $persona->fechaIngreso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Productos Almacenados: </label>
                        <input type="text" class="form-control" name="txtProductosAlm" autofocus required
                        value="<?php echo $persona->productosAlm; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>