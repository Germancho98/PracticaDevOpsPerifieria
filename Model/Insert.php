<?php
    $Cn->Ejecutar("INSERT INTO PROVEEDORES(idproveedor,nombrecompania,nombrecontacto) VALUES((select MAX(idproveedor)+1 from proveedores) ,'" . $_GET['AA'] . "','" . $_GET['AP'] . "')");

