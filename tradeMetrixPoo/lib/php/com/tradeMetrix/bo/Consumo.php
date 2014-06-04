<?php
/**
 * @author michael
 * @copyright 2014
 */
class Consumo{
    private $_idEventoConsumo;
    private $_idUsuarioConsumo;
    private $_idProductoConsumo;
    private $_consumo;
    private $_fotoConsumo;
    
    public function setIdEventoConsumo($clave=null){
        $this->_idEventoConsumo = $clave;
    }
    
    public function getIdEventoConsumo(){
        return $this->_idEventoConsumo;
    }
    
    public function setIdUsuarioConsumo($clave=null){
        $this->_idUsuarioConsumo = $clave;
    }
    
    public function getIdUsuarioConsumo(){
        return $this->_idUsuarioConsumo;
    }
    
    public function setIdProductoConsumo($clave=null){
        $this->_idProductoConsumo = $clave;
    }
    
    public function getIdProductoConsumo(){
        return $this->_idProductoConsumo;
    }
    
    public function setConsumo($clave=null){
        $this->_consumo = $clave;
    }
    
    public function getConsumo(){
        return $this->_consumo;
    }
    
    public function setFotoConsumo($clave=null){
        $this->_fotoConsumo = $clave;
    }
    
    public function getFotoConsumo(){
        return $this->_fotoConsumo;
    }
}
?>