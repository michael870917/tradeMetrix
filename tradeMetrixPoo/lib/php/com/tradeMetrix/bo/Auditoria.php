<?php
/**
 * @author michael
 * @copyright 2014
 */
class Auditoria{
    private $_idAuditoria;
    private $_fechaAuditoria;
    private $_periodoIniAuditoria;
    private $_periodoFinAuditoria;
    private $_idUsuarioAuditoria;
    private $_usuarioAuditoria;
    private $_idEventoAuditoria;
    
    public function setIdAuditoria($clave=null){
        $this->_idAuditoria = $clave;
    }
    
    public function getIdAuditoria(){
        return $this->_idAuditoria;
    }
    
    public function setFechaAuditoria($clave=null){
        $this->_fechaAuditoria = $clave;
    }
    
    public function getFechaAuditoria(){
        return $this->_fechaAuditoria;
    }
    
    public function setPeriodoIniAuditoria($clave=null){
        $this->_periodoIniAuditoria = $clave;
    }
    
    public function getPeriodoIniAuditoria(){
        return $this->_periodoIniAuditoria;
    }
    
    public function setPeriodoFinAuditoria($clave=null){
        $this->_periodoFinAuditoria = $clave;
    }
    
    public function getPeriodoFinAuditoria(){
        return $this->_periodoFinAuditoria;
    }
    
    public function setIdUsuarioAuditoria($clave=null){
        $this->_idUsuarioAuditoria = $clave;
    }
    
    public function getIdUsuarioAuditoria(){
        return $this->_idUsuarioAuditoria;
    }
    
    public function setUsuarioAuditoria($clave=null){
        $this->_usuarioAuditoria = $clave;
    }
    
    public function getUsuarioAuditoria(){
        return $this->_usuarioAuditoria;
    }
    
    public function setIdEventoAuditoria($clave=null){
        $this->_idEventoAuditoria = $clave;
    }
    
    public function getIdEventoAuditoria(){
        return $this->_idEventoAuditoria;
    }
}
?>