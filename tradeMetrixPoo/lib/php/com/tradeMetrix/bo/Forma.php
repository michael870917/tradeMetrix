<?php

/**
 * @author michael
 * @copyright 2014
 */
class Forma{
    private $_idForma;
    private $_idActividadForma;
    private $_idClasificacionForma;
    private $_clasificacionForma;
    private $_nombreForma;
    private $_statusForma;
    private $_listPreguntasForma;
    
    public function setIdForma($clave=null){
        $this->_idForma = $clave;
    }
    
    public function getIdForma(){
        return $this->_idForma;
    }
    
    public function setIdActividadForma($clave=null){
        $this->_idActividadForma = $clave;
    }
    
    public function getIdActividadForma(){
        return $this->_idActividadForma;
    }
    
    public function setIdClasificacionForma($clave=null){
        $this->_idClasificacionForma = $clave;
    }
    
    public function getIdClasificacionForma(){
        return $this->_idClasificacionForma;
    }
    
    public function setClasificacionForma($clave=null){
        $this->_clasificacionForma = $clave;
    }
    
    public function getClasificacionForma(){
        return $this->_clasificacionForma;
    }
    
    public function setNombreForma($clave=null){
        $this->_nombreForma = $clave;
    }
    
    public function getNombreForma(){
        return $this->_nombreForma;
    }
    
    public function setStatusForma($clave=null){
        $this->_statusForma = $clave;
    }
    
    public function getStatusForma(){
        return $this->_statusForma;
    }
    
    public function setListPreguntasForma($clave=null){
        $this->_listPreguntasForma = $clave;
    }
    
    public function getListPreguntasForma(){
        return $this->_listPreguntasForma;
    }
}
?>