<?php

    class ConectaPDO {

        var $Cn;
        var $Rs;
        var $u;

        function __construct($Bd) {
            try {
                $this->Cn = new PDO('sqlite:' . $Bd);
            } catch (Exception $e) {
                die($e);
            }
        }

        function Ejecutar($secuencia) {
            $this->Rs = $this->Cn->prepare($secuencia . ';') or die("FALLO LA SENTENCIA" . $secuencia);
            $this->Rs->execute();
        }

        function cargar() {

            $this->u = $this->Rs->fetch();
            return ($this->u);
        }

        function getdato($col) {
            //$a =$this->Rs->fetchColumn($col);
            $a = $this->u[$col];
            return $a;
        }

    }
