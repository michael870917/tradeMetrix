<?php
/**
 * @author michael
 * @copyright 2014
 */
class CatalogoGenerico{
    private $_idCatalogo;
    private $_descripcionCatalogo;    
    
    public function setIdCatalogo($clave=null){
        $this->_idCatalogo = $clave;
    }
    
    public function getIdCatalogo(){
        return $this->_idCatalogo;
    }
    
    
    public function setDescripionCatalogo($clave=null){
        $this->_descripcionCatalogo = $clave;
    }
    
    public function getDescripcionCatalogo(){
        return $this->_descripcionCatalogo;
    }
    
            
}
?>