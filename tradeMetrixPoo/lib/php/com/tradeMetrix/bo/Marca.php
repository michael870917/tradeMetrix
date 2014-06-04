<?php
/**
 * @author michael
 * @copyright 2014
 */
class Marca{
    private $_idMarca;
    private $_marca;
    private $_acronimoMarca;
    private $_categoriaMarca;
    
    public function setIdMarca($clave=null){
        $this->_idMarca = $clave;
    }
    
    public function getIdMarca(){
        return $this->_idMarca;
    }
    
    public function setMarca($clave=null){
        $this->_marca = $clave;
    }
    
    public function getMarca(){
        return $this->_marca;
    }
    
    public function setAcronimoMarca($clave=null){
        $this->_acronimoMarca = $clave;
    }
    
    public function getAcronimoMarca(){
        return $this->_acronimoMarca;
    }
    
    public function setCategoriaMarca($clave=null){
        $this->_categoriaMarca = $clave;
    }
    
    public function getCategoriaMarca(){
        return $this->_categoriaMarca;
    }
}
?>