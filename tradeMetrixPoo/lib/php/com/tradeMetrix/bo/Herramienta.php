<?php

/**
 * @author michael
 * @copyright 2014
 */
class Herramienta{
    private $_idHerramienta;
    private $_herramienta;
    private $_idCampaniaHerramienta;
    
    public function setIdHerramienta($clave=null){
        $this->_idHerramienta = $clave;
    }
    
    public function getIdHerramienta(){
        return $this->_idHerramienta;
    }
    
    public function setHerramienta($clave=null){
        $this->_herramienta = $clave;
    }
    
    public function getHerramienta(){
        return $this->_herramienta;
    }    
    
    public function setIdCampaniaHerramienta($clave=null){
        $this->_idCampaniaHerramienta = $clave;
    }
    
    public function getIdCampaniaHerramienta(){
        return $this->_idCampaniaHerramienta;
    }
    
    public function  FormaObjetoListaHerramientaCampania($array){        
        $read = new LecturaHerramientas();
        foreach($array as $key => $value){
            $objMayor = new Herramienta();
            $objMayor->setIdHerramienta($value->idHerramienta);
            $objMayor->setHerramienta($value->herramientaCampania);
            $objMayor->setIdCampaniaHerramienta($value->idCampania);            
            $read->setNuevoObjetoHerramienta($objMayor);
            $read->cargarObjetosHerramienta();
        }        
        $coleccion=$read->getListaObjetosHerramienta();
        return $coleccion;
    }
}




class LecturaHerramientas{
    private $_arregloObjetosHerramienta = array();    
    
    ///////////////////////////////////////////////
    // Opera Bloque Herramientas    
    public function cargarObjetosHerramienta(){
        array_push($this->_arregloObjetosHerramienta,$this->nuevoArreglo);
    }
    
    public function getListaObjetosHerramienta(){
        return $this->_arregloObjetosHerramienta;
    }
    
    public function setNuevoObjetoHerramienta(Herramienta $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }        
}

?>