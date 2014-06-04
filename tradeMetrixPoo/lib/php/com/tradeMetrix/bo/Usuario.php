<?php
/**
 * @author michael
 * @copyright 2014
 */
class Usuario{
    private $_idUsuario;
    private $_idRolUsuario;    
    private $_rolUsuario;
    private $_idPlazaUsuario;
    private $_plazaUsuario; 
    private $_idRegionUsuario;
    private $_regionUsuario;
    private $_idCCUsuario;
    private $_ccUsuario;
    private $_idMarcaUsuario;
    private $_marcaUsuario;
    private $_nombreUsuario;
    private $_usuario;
    private $_claveUsuario;
    private $_emailUsuario;
    private $_telcelUsuario;
    private $_telcasaUsuario;
    private $_fotoUsuario;
    private $_domicilioUsuario;    
    
    public function setIdUsuario($clave=null){
        $this->_idUsuario = $clave;
    }
    
    public function getIdUsuario(){
        return $this->_idUsuario;
    }
    
    public function setIdRolUsuario($clave=null){
        $this->_idRolUsuario = $clave;
    }
    
    public function getIdRolUsuario(){
        return $this->_idRolUsuario;
    }
    
    public function setRolUsuario($clave=null){
        $this->_rolUsuario = $clave;
    }
    
    public function getRolUsuario(){
        return $this->_rolUsuario;
    }
    
    public function setIdPlazaUsuario($clave=null){
        $this->_idPlazaUsuario = $clave;
    }
    
    public function getIdPlazaUsuario(){
        return $this->_idPlazaUsuario;
    }
    
    public function setPlazaUsuario($clave=null){
        $this->_plazaUsuario = $clave;
    }
    
    public function getPlazaUsuario(){
        return $this->_plazaUsuario;
    }
        
    public function setIdRegionUsuario($clave=null){
        $this->_idRegionUsuario = $clave;
    }
    
    public function getIdRegionUsuario(){
        return $this->_idRegionUsuario;
    }
    
    public function setRegionUsuario($clave=null){
        $this->_regionUsuario = $clave;
    }
    
    public function getRegionUsuario(){
        return $this->_regionUsuario;
    }
    
    public function setIdCCUsuario($clave=null){
        $this->_idCCUsuario = $clave;
    }
    
    public function getIdCCUsuario(){
        return $this->_idCCUsuario;
    }
    
    
    public function setCCUsuario($clave=null){
        $this->_ccUsuario = $clave;
    }
    
    public function getCCUsuario(){
        return $this->_ccUsuario;
    }
    
    public function setIdMarcaUsuario($clave=null){
        $this->_idMarcaUsuario = $clave;
    }
    
    public function getIdMarcaUsuario(){
        return $this->_idMarcaUsuario;
    }
    
    public function setMarcaUsuario($clave=null){
        $this->_marcaUsuario = $clave;
    }
    
    public function getMarcaUsuario(){
        return $this->_marcaUsuario;
    }
        
    public function setNombreUsuario($clave=null){
        $this->_nombreUsuario = $clave;
    }
    
    public function getNombreUsuario(){
        return $this->_nombreUsuario;
    }
    
    public function setUsuario($clave=null){
        $this->_usuario = $clave;
    }
    
    public function getUsuario(){
        return $this->_usuario;
    }
    
    public function setClaveUsuario($clave=null){
        $this->_claveUsuario = $clave;
    }
    
    public function getClaveUsuario(){
        return $this->_claveUsuario;
    }
    
    public function setEmailUsuario($clave=null){
        $this->_emailUsuario = $clave;
    }
    
    public function getEmailUsuario(){
        return $this->_emailUsuario;
    }
    
    public function setTelcelUsuario($clave=null){
        $this->_telcelUsuario = $clave;
    }
    
    public function getTelcelUsuario(){
        return $this->_telcelUsuario;
    }
    
    public function setTelcasaUsuario($clave=null){
        $this->_telcasaUsuario = $clave;
    }
    
    public function getTelcasaUsuario(){
        return $this->_telcasaUsuario;
    }
    
    public function setFotoUsuario($clave=null){
        $this->_fotoUsuario = $clave;
    }
    
    public function getFotoUsuario(){
        return $this->_fotoUsuario;
    }
    
    public function setDomicilioUsuario($clave=null){
        $this->_domicilioUsuario = $clave;
    }
    
    public function getDomicilioUsuario(){
        return $this->_domicilioUsuario;
    }
}
?>