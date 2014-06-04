<?php
/**
 * @author michael
 * @copyright 2014
 */
class CentroConsumo{
    private $_idCC;
    private $_idPlazaCC;
    private $_plazaCC;
    private $_nombreCC;
    private $_geolngCC;
    private $_geolatCC;
    private $_direccionCC;
    private $_aforoCC;
    
    public function setIdCC($clave=null){
        $this->_idCC = $clave;
    }
    
    public function getIdCC(){
        return $this->_idCC;
    }
    
    public function setIdPlazaCC($clave=null){
        $this->_idPlazaCC = $clave;
    }
    
    public function getIdPlazaCC(){
        return $this->_idPlazaCC;
    }
    
    public function setPlazaCC($clave=null){
        $this->_plazaCC = $clave;
    }
    
    public function getPlazaCC(){
        return $this->_plazaCC;
    }
    
    public function setNombreCC($clave=null){
        $this->_nombreCC = $clave;
    }
    
    public function getNombreCC(){
        return $this->_nombreCC;
    }
    
    public function setGeolngCC($clave=null){
        $this->_geolngCC = $clave;
    }
    
    public function getGeolngCC(){
        return $this->_geolngCC;
    }
    
    public function setGeolatCC($clave=null){
        $this->_geolatCC = $clave;
    }
    
    public function getGeolatCC(){
        return $this->_geolatCC;
    }
    
    public function setDireccionCC($clave=null){
        $this->_direccionCC = $clave;
    }
    
    public function getDireccionCC(){
        return $this->_direccionCC;
    }
    
    public function setAforoCC($clave=null){
        $this->_aforoCC = $clave;
    }
    
    public function getAforoCC(){
        return $this->_aforoCC;
    }
}
?>