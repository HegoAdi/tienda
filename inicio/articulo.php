<?php
$titulo ='Articulos deportivos';
require_once ('../conexion/conexion.php');
//Asignamos una consulta SQL a la variable $sql
$mostrar_formulario_edicion = FALSE;
if($_POST){
    $sql_update = 'UPDATE articulo SET codigo_art = ?, nombreArticulo =?, medida =?, precio =?, descripcion =?, WHERE codigo_art =?';
    $codigo=isset($_GET['codigo'])? $_GET['codigo'] : '';
    $codigo2=isset($_POST['codigo2'])? $_POST['codigo2'] : '';
    $nombre=isset($_POST['nombre'])? $_POST['nombre'] : '';
    $medida=isset($_POST['medida'])? $_POST['medida'] : '';
    $precio=isset($_POST['precio'])? $_POST['precio'] : '';
    $descripcion=isset($_POST['descripcion'])? $_POST['descripcion'] : '';
    $stament_update = $pdo ->prepare($sql_update);
    $stament_update ->execute(array($codigo2,$nombre,$medida,$precio,$codigo));
    header('Location.articulo.php');
}
if(isset($_GET['codigo'])){
    $mostrar_formulario_edicion = TRUE;
    $sql_seleccionar_codigo = 'SELECT * from articulo where codigo_art=?';
    $codigo = isset($_GET['codigo'])? $_GET['codigo'] : 0;

    $stament_consultar = $pdo->prepare($sql_seleccionar_codigo);
    $stament_consultar ->execute(array($codigo));
    $rs_consulta = $stament_consultar ->fetch();
}
$sql ='select * from articulo';
$stament= $pdo->prepare($sql);
$stament->execute();
$results=$stament->fetchAll();
?>
<?php
include('../extend/header.php');
?>
<div class="container">
    <?php
        if($mostrar_formulario_edicion) {
            ?>
            <form method="post">
                <input placeholder="Codigo del articulo" name="codigo" type="text" value="<?php echo $rs_consulta['codigo_art']?>">
                <input placeholder="Nombre del articulo" name="nombre" type="text" value="<?php echo $rs_consulta['nombreArticulo']?>">
                <input placeholder="Medida del articulo" name="medida" type="text" value="<?php echo $rs_consulta['medida']?>">
                <input placeholder="Precio del articulo" name="precio" type="text" value="<?php echo $rs_consulta['precio']?>">
                <input placeholder="Descripcion del articulo" name="descripcion" type="text" value="<?php echo $rs_consulta['descripcion']?>">
                <input type="submit" value="Agregar" class="btn">
            </form>

            <?php
        }
    ?>
    <div class ="row">
        <?php
        foreach ($results as $key )
        {
        ?>
        <div class="col s4 m4">
            <div class="card light-blue">
                <div class="card-content white-text">
                    <span class="card-title">
                     Código articulo:    <?php echo $key['codigo_art'] ?>
                        <p>
                            Nombre: <?php echo $key['nombreArticulo'] ?><br>
                            Medida: <?php echo $key['medida'] ?><br>
                            Precio:<?php echo $key['precio'] ?><br>
                            Descripcion:<?php echo $key['descripcion'] ?><br>

                        </p>
                    </span>
                </div>
                <div class="card-action">
                    <a href="articulo.php?codigo=<?php echo $key['codigo_art'] ?>">Editar</a>
<a href="#">Borrar</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>





    </div>
</div>

<?php
include('../extend/footer.php');
?>
