
<?php
$titulo ='Clientes';
require_once ('../conexion/conexion.php');
if($_GET){
    $insert_cliente = 'insert into clientes(codigo_Cliente, nombreCliente, apellido_P_Cliente, apellido_M_Cliente) VALUES (?,?,?,?) ';

    $codigo=isset($_GET['codigo'])? $_GET['codigo'] : '';
    $nombre=isset($_GET['nombre'])? $_GET['nombre'] : '';
    $medida=isset($_GET['app'])? $_GET['app'] : '';
    $precio=isset($_GET['apm'])? $_GET['apm'] : '';

    $stament_insert = $pdo-> prepare($insert_cliente);
    $stament_insert->execute(array($codigo, $nombre,$app,$apm));

}




//Asignamos una consulta SQL a la variable $sql
$sql ='select * from clientes';
$stament= $pdo->prepare($sql);
$stament->execute();
$results=$stament->fetchAll();
?>
<?php
include('../extend/header.php');
?>
<div class="container">
    <h3>Insertar Clientes</h3>
    <form method="get">
        <input placeholder="Codigo Cliente" name="codigo" type="text">
        <input placeholder="Nombre Cliente" name="nombre" type="text">
        <input placeholder="Apellido Paterno" name="medida" type="text">
        <input placeholder="Apellido Materno" name="precio" type="text">
        <input type="submit" value="Agregar" class="btn">
    </form>
    <h3>Lista de art&iacute;culos</h3>

    <table class="striped">
        <thead>
        <tr>
            <td>C&oacute;digo art&iacute;culos</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $key ) {
            ?>
            <tr>
                <td><?php echo $key['codigo_Cliente'] ?></td>
                <td><?php echo $key['nombreCliente'] ?></td>
                <td><?php echo $key['app'] ?></td>
                <td><?php echo $key['apm'] ?></td>
            </tr>
            <?php
        }

        ?>
        </tbody>
    </table>
</div>

<?php
include('../extend/footer.php');
?>
