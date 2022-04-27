<?php
if (!isset($_GET["busque"])) {
    $a = "select * from proveedores";
} else {
    $a = "select * from proveedores where " . $_GET["campo"] . " like '%" . $_GET["busque"] . "%'";
}
$Cn->Ejecutar($a);

