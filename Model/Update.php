<?php
    $Cn->Ejecutar("UPDATE PROVEEDORES SET NOMBRECOMPANIA='".$_GET["AAU"]."',NOMBRECONTACTO='".$_GET["APU"]."' WHERE IDPROVEEDOR=".$_GET["COD"]);                          
