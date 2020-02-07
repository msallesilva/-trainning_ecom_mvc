<?php

namespace Models\Contracts{

    interface CrudInterface{
        public function find($id);
        public function findAll();
        public function save();
        public function delete($id);        
    }
}
?>