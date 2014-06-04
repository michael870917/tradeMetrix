<?php

/**
 * @author michael
 * @copyright 2014
 */
class Actividad{
    private $_idActividad;
    private $_idTipoActividad;
    private $_tipoActividad;
    private $_idClasificacionActividad;
    private $_clasificacionActividad;
    private $_descripcionActividad;
    private $_prioridadActividad;
    private $_listFormaActividad;
    
    public function setIdActividad($clave=null){
        $this->_idActividad = $clave;
    }
    
    public function getIdActividad(){
        return $this->_idActividad;
    }
    
    public function setIdTipoActividad($clave=null){
        $this->_idTipoActividad = $clave;
    }
    
    public function getIdTipoActividad(){
        return $this->_idTipoActividad;
    }
    
    public function setTipoActividad($clave=null){
        $this->_tipoActividad = $clave;
    }
    
    public function getTipoActividad(){
        return $this->_tipoActividad;
    }
    
    public function setIdClasificacionActividad($clave=null){
        $this->_idClasificacionActividad = $clave;
    }
    
    public function getIdClasificacionActividad(){
        return $this->_idClasificacionActividad;
    }
    
    public function setClasificacionActividad($clave=null){
        $this->_clasificacionActividad = $clave;
    }
    
    public function getClasificacionActividad(){
        return $this->_clasificacionActividad;
    }
    
    public function setDescripcionActividad($clave=null){
        $this->_descripcionActividad = $clave;
    }
    
    public function getDescripcionActividad(){
        return $this->_descripcionActividad;
    }
    
    public function setPrioridadActividad($clave=null){
        $this->_prioridadActividad = $clave;
    }
    
    public function getPrioridadActividad(){
        return $this->_prioridadActividad;
    }
    
    public function setListFormaActividad($clave=null){
        $this->_listFormaActividad = $clave;
    }
    
    public function getListFormaActividad(){
        return $this->_listFormaActividad;
    }
}
?>