<?php
/**
 * @author michael
 * @copyright 2014
 */
class Evento{
    private $_idEvento;
    private $_idCampania;
    private $_idCC;
    private $_CC;
    private $_fechaEvento;
    private $_horainiEvento;
    private $_horafinEvento;
    private $_activo;
    private $_idUsuario; 
    private $_idRegla;
    private $_cumplida;
    
    
    public function setIdEvento($clave=null){
        $this->_idEvento = $clave;
    }
    
    public function getIdEvento(){
        return $this->_idEvento;
    }
    
    public function setIdCampaniaEvento($clave=null){
        $this->_idCampania = $clave;
    }
    
    public function getIdCampaniaEvento(){
        return $this->_idCampania;
    }
    
    public function setIdCCEvento($clave=null){
        $this->_idCC = $clave;
    }
    
    public function getIdCCEvento(){
        return $this->_idCC;
    }
    
    public function setNombreCCEvento($clave=null){
        $this->_CC = $clave;
    }
    
    public function getNombreCCEvento(){
        return $this->_CC;
    }
    
    public function setFechaEvento($clave=null){
        $this->_fechaEvento = $clave;
    }
    
    public function getFechaEvento(){
        return $this->_fechaEvento;
    }
    
    public function setHorainiEvento($clave=null){
        $this->_horainiEvento = $clave;
    }
    
    public function getHorainiEvento(){
        return $this->_horainiEvento;
    }
    
    public function setHorafinEvento($clave=null){
        $this->_horafinEvento = $clave;
    }
    
    public function getHorafinEvento(){
        return $this->_horafinEvento;
    }
    
    public function setActivoEvento($clave=null){
        $this->_activo = $clave;
    }
    
    public function getActivoEvento(){
        return $this->_activo;
    }
    
    public function setIdUsuarioToEvento($clave=null){
        $this->_idUsuario = $clave;
    }
    
    public function getIdUsuarioToEvento(){
        return $this->_idUsuario;
    }
    
    public function setIdReglaToEvento($clave=null){
        $this->_idRegla = $clave;
    }
    
    public function getIdReglaToEvento(){
        return $this->_idRegla;
    }
    
    public function setCumplirToEvento($clave=null){
        $this->_cumplida = $clave;
    }
    
    public function getCumplirToEvento(){
        return $this->_cumplida;
    }
    
}
?>