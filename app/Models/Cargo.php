<?php

namespace Models{

use \Repository\CargoRepository;

require '../../vendor/autoload.php';    
    
    class Cargo extends BaseModel implements \Models\Contracts\CrudInterface{
        
        private $nome,$departamento;

        public function __construct($id = 0, $nome = '',$departamento = '')
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->departamento = $departamento;
        }

        public function getNome()
        {
            return $this->nome;
        }
        public function getDepartamento()
        {
            return $this->departamento;
        }

        public function find($id){}
        public function findAll(){
            $repository = new CargoRepository();
            $cargos = $repository->findAll();
            return $cargos;
        }
        public function save(){}
        public function delete($id){}  
   }

   $c1 = new Cargo();
}
?>