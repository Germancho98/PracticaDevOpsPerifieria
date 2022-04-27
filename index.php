<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />  
        <title>Crud PHP - Periferia</title>
        <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css"/>
        <!--<link rel="stylesheet" href="css/normalize.css"/>-->
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="shortcut icon" href="https://www.redhat.com/misc/favicon.ico"/>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="" onclick="recargar();">
                <img src="https://periferiaitgroup.com/wp-content/uploads/2021/09/Logo-Periferia-1.png" width="120" height="64" alt="">
            </a>
        </nav>
        <br>
        <div class="container">
            <div class="row">
                <form name="mio" class="col-12 form-inline">
                    <script src="js/Scripts.js"></script>
                    <?php 
                        include "Config/CONEXION.php";
                        $Cn = new ConectaPDO("BD/Neptuno.sqlite");
                        if (!isset($_GET["N"]))
                            $_GET["N"] = "";
                        if ($_GET["N"] == "") {
                    ?>
                    <div class=" form-group btn-toolbar" role='toolbar'>
                        <div class='btn-group mr-2' role='group'>    
                            <label>Buscar: </label>
                        </div> 
                        <div class='btn-group mr-2' role='roup'>                          
                            <input type="text" name="busque" class="form-control" autocomplete="off" autofocus="" size="60">
                        </div>
                        <div class='btn-group mr-2' role='roup'>   
                            <select name="campo"class="form-control border-0">
                                <option value="nombrecompania">Nombre compañia</option>
                                <option value="nombrecontacto">Nombre del contacto</option>
                            </select>
                        </div>
                        <div class='btn-group mr-2' role='roup'>
                            <button onclick='va("")' class="btn btn-outline-info">Buscar</button>
                        </div>     
                    </div>
                        <br>
                        <br>
                    <div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'>
                        <div class='btn-group mr-2' role='group'>
                            <button onclick='Va(1)' class='btn btn-outline-success'>Crear</button>
                        </div> 
                        <div class='btn-group mr-2' role='roup'>
                            <button onclick='Va(2)' class='btn btn-outline-secondary'>Editar</button>
                        </div> 
                        <div class='btn-group' role='group'>
                            <button onclick='Va(3)' class='btn btn-outline-danger'>Borrar</button>
                        </div> 
                    </div>
                        <?php 
                            include 'Model/Search.php'; 
                            echo "";
                            echo "<table class='table table-dark' id='tabla'>";
                        ?>    
                            <tr>
                                <td>Nombre de la Empresa</td>
                                <td>Persona encargada</td>
                            </tr>
                        <?php    
                            while ($Cn->Cargar()) {
                        ?>                          
                            <tr>
                                <td> 
                                    <input type="radio" class="form-check-input" name="x" onclick='Pulsar(<?php echo $Cn->getdato("idproveedor") ?>)'><?php echo ' '; echo $Cn->getdato("nombrecompania") ?> 
                                </td>
                                <td>
                                    <?php echo $Cn->getdato("nombrecontacto") ?>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        <input type="hidden" name="N">
                        <?php
                            echo "</table>";
                            echo "<input type=hidden name=COD>";
                            }
                            if ($_GET["N"] == 1) {
                        ?>
                        <input type="hidden" name="N" value="11">
                        <center>
                            <table class="table taable bordered">
                                <tr>
                                    <td>Nombre de la compañia </td><td><input type="text" name="AA" class="form-control" autocomplete="off" autofocus="" required=""></td>
                                </tr>
                                <tr>
                                    <td>Nombre del contacto de la compañia </td><td><input type="text" name="AP" class="form-control" autocomplete="off" autofocus="" required=""></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-info" onclick="va(11)">Registrar</button>
                                        <button class="btn btn-outline-dark" onclick='Va("")'>Regresar</button>
                                    </td>
                                </tr>
                            </table>
                        </center>
                        <?php
                            }
                            if ($_GET ["N"] == 11) {
                                include './Model/Insert.php';
                        ?>
                        <div class="alert alert-success" role="alert">
                            Se creó el regístro correctamente
                            <button class="btn btn-outline-dark" onclick="delayRedirect()">Aceptar</button>                          
                        </div>
                        <?php
                            }
                            if($_GET["N"]==3){
                            if($_GET["COD"]==""){?>
                                <div class="alert alert-danger" role="alert">
                                    Debe elegír una compañia para eliminar            
                                    <button class="btn btn-outline-dark" onclick="delayRedirect()">Aceptar</button> 
                                </div>
                        <?php
                            }else {
                        ?>
                            <input type="hidden" name="COD" value="<?php echo $_GET["COD"]?>">
                            <input type="hidden" name="N">
                            <center>
                                <table>
                                    <tr><td>Desea eliminar el proveedor S/N</td></tr>
                                    <center><tr><td><button class="btn btn-outline-danger" onclick='Va(31)'>SI</button> <button class="btn btn-outline-dark" onclick='Va("")'>NO</button></td></tr></center>
                                </table>
                            </center>
                        <?php
                                }

                            }    
                            if($_GET["N"]==31){
                        ?>
                                <div class="alert alert-success" role="alert">
                                    Se elimino correctamente
                                    <button class="btn btn-outline-dark" onclick="delayRedirect()">Aceptar</button>                          
                                </div>
                        <?php
                            }
                            if ($_GET["N"]==2) {
                            if ($_GET["COD"]==""){
                        ?>
                            <div class="alert alert-warning" role="alert">
                                Debe escojer un proovedor para actualizarlo
                                <button class="btn btn-outline-dark" onclick="delayRedirect()">Aceptar</button>                          
                            </div>
                        <?php
                            }else {
                                include './Model/Select.php';
                        ?>
                            <input type="hidden" name="COD" value="<?php echo $_GET["COD"]?>">
                            <input type='hidden' name='N' value='21'>
                            <center>
                                <table border="1">
                                            <tr>
                                                <td>Nombre compañia</td><td><input type="text" name="AAU" value="<?php echo $Cn->getdato("nombrecompania"); ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Nombre contacto</td><td><input type="text" name="APU" value="<?php echo $Cn->getdato("nombrecontacto") ?>"</td>
                                    </tr>
                                    <tr>
                                        <td COLSPAN="2"> <button class="btn btn-info" onclick="Va(21)">Guardar</button></td>
                                    </tr>
                                </table>
                            </center>
                        <?php
                                }
                            }
                            if ($_GET["N"]== 21){
                        ?>
                            <div class="alert alert-warning" role="alert">
                                Datos actualizados correctamente
                                <button class="btn btn-outline-dark" onclick="delayRedirect()">Aceptar</button>                          
                            </div>
                        <?php
                            }
                        ?>     
                    </div>
                </form>     
            </div>
    </body>
</html>
