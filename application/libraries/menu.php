<?php

class Menu {
    
    public function getIntegrantes() {
        $i = new Integrante_m();
        return $i->getAll('i.nome', 'asc');
    }
    
    public function getEspetaculos() {
        return Doctrine::getTable('Espetaculo_m')->findAll(Doctrine::HYDRATE_ARRAY);
    }
    
    

}