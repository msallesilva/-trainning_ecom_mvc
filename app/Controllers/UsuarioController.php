<?php

namespace Controllers{

    require '../../vendor/autoload.php';


    class UsuarioController {
        public function index(){
            $usuarioView = new \Views\UsuarioView();
            $resultado = $usuarioView->index();
            return $resultado;
        }
    }
}

?>