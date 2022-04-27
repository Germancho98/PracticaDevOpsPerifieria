<?php
    $Cn->Ejecutar("SELECT * FROM PROVEEDORES WHERE IDPROVEEDOR=".$_GET["COD"]);
    $Cn->cargar();

