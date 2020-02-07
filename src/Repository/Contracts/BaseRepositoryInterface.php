<?php

namespace Repository\Contracts{

    require __DIR__ . '/../../../vendor/autoload.php';    

    use \Models\BaseModel;

    Interface BaseRepositoryInterface{

        public function find($id);

        public function findAll();
        
        public function save(BaseModel $entity);

        public function update(BaseModel $entity);
    }
}
?>