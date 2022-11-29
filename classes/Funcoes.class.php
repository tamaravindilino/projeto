<?php
    class Funcoes{
        public function tratarCaracter($valor,$tipo)
        {
            switch($tipo){
                case 1: $return = utf8_decode($valor); break;
                case 2: $return = htmlentities($valor,ENT_QUOTES, "ISO-8859-1"); break;
            }
            return $return;
        }

        public function dataAtual($tipo)
        {
            switch($tipo){
                case 1: $return = date("Y-m-d"); break;
                case 2: $return = date("Y-m-d H:i:s"); break;
                case 3: $return = date("d/m/Y"); break;
            }
            return $return;
        }

        public function base64($valor,$tipo)
        {
            switch($tipo){
                case 1: $return = base64_encode($valor); break;
                case 2: $return = base64_decode($valor); break;
            }
            return $return;
        }

        public function maskData($valor,$tipo)
        {
            switch($tipo){
                case 1: $return = date('d/m/Y', strtotime($valor)); break; # data brasil
                case 2: $return = date('Y-m-d', strtotime($valor)); break; # data banco 
            }
            return $return;
        }

         public function maskMoeda($valor,$tipo)
        {
            $source = array('.', ',');
            $replace = array('', '.');
            $valor = str_replace($source, $replace, $valor); 
            return $valor; 
        }
    }
?>