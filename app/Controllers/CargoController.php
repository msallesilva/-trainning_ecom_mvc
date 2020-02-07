<?php

namespace Controllers{

    require '../../vendor/autoload.php';


    class CargoController {
        public function index(){
            $cargoView = new \Views\CargoView();
            $resultado = $cargoView->index();
            return $resultado;
        }
    }
}

?>