<?php
/**
 * @author michael
 * @copyright 2014
 */
class Plaza{
    private $_idPlaza;
    private $_idRegionPlaza;
    private $_distritoPlaza;
    
    public function setIdPlaza($clave=null){
        $this->_idPlaza = $clave;
    }
    
    public function getIdPlaza(){
        return $this->_idPlaza;
    }
    
    public function setIdRegionPlaza($clave=null){
        $this->_idRegionPlaza = $clave;
    }
    
    public function getIdRegionPlaza(){
        return $this->_idRegionPlaza;
    }
    
    public function setDistritoPlaza($clave=null){
        $this->_distritoPlaza = $clave;
    }
    
    public function getDistritoPlaza(){
        return $this->_distritoPlaza;
    }    
}
?>