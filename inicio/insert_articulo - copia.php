<?php
$titulo ='Clientes';
require_once ('../conexion/conexion.php');
if($_GET){
    $insert_cliente = 'insert into clientes(codigoCliente, nombreCliente, apellido_P_Cliente, apellido_M_Cliente) VALUES (?,?,?,?) ';

    $codigo=isset($_GET['codigoc'])? $_GET['codigoc'] : '';
    $nombre=isset($_GET['nombrec'])? $_GET['nombrec'] : '';
    $medida=isset($_GET['app'])? $_GET['app'] : '';
    $precio=isset($_GET['apm'])? $_GET['apm'] : '';

    $stament_insert = $pdo-> prepare($insert_cliente);
    $stament_insert->execute(array($codigoc, $nombrec, $app, $apm));

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
    <h3>Insertar clientes</h3>
    <form method="get">
        <input placeholder="Codigo Cliente" name="Codigo Cliente" type="text">
        <input placeholder="Nombre Cliente" name="Nombre Cliente" type="text">
        <input placeholder="Apellido Paterno" name="Apellido Paterno" type="text">
        <input placeholder="Apellido Materno" name="Apellido Materno" type="text">
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
