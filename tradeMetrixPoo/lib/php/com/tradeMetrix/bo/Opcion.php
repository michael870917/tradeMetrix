<?php

/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/OpcionDAO.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class Opcion{
    private $_idOpcion;
    private $_idPreguntaOpcion;
    private $_idOpcionElegir;
    private $_observacionOpcion;
    private $_requeridoOpcion;    
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoClassDAO = new OpcionDAO();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoClassDAO);
        unset($this->_utilities);
    }
    
    public function setIdOpcion($clave=null){
        $this->_idOpcion = $clave;
    }
    
    public function getIdOpcion(){
        return $this->_idOpcion;
    }
    
    public function setIdPreguntaOpcion($clave=null){
        $this->_idPreguntaOpcion = $clave;
    }
    
    public function getIdPreguntaOpcion(){
        return $this->_idPreguntaOpcion;
    }
    
    public function setIdOpcionElegir($clave=null){
        $this->_idOpcionElegir = $clave;
    }
    
    public function getIdOpcionElegir(){
        return $this->_idOpcionElegir;
    }

    public function setObservacionOpcion($clave=null){
        $this->_observacionOpcion = $clave;
    }
    
    public function getObservacionOpcion(){
        return $this->_observacionOpcion;
    }

    public function setRequeridoOpcion($clave=null){
        $this->_requeridoOpcion = $clave;
    }
    
    public function getRequeridoOpcion(){
        return $this->_requeridoOpcion;
    }




    
    
    public function InsertaOpcion($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdPreguntaOpcion(),$obj->getIdOpcionElegir(),$obj->getObservacionOpcion(),$obj->getRequeridoOpcion());
                $lastId=$this->_objetoClassDAO->InsertaOpcionesApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
                
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaOpcion($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdPreguntaOpcion(),$obj->getIdOpcionElegir(),$obj->getObservacionOpcion(),$obj->getRequeridoOpcion()
                ,$obj->getIdOpcion());
                $this->_value = $this->_objetoClassDAO->ActualizarOpcionesApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarOpcion($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdOpcion());
                $this->_value = $this->_objetoClassDAO->EliminarOpcionesApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
}
?>