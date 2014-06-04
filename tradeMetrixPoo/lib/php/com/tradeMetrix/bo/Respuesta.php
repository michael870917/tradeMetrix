<?php

/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/RespuestaDAO.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class Respuesta{
    private $_idRespuesta;
    private $_idEventoRespuesta;
    private $_idPreguntaRespuesta;
    private $_idFormaRespuesta;
    private $_idUsuarioRespuesta;
    private $_respuesta;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoClassDAO = new RespuestaDAO();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoClassDAO);
        unset($this->_utilities);
    }
    
    public function setIdRespuesta($clave=null){
        $this->_idRespuesta = $clave;
    }
    
    public function getIdRespuesta(){
        return $this->_idRespuesta;
    }
    
    public function setIdEventoRespuesta($clave=null){
        $this->_idEventoRespuesta = $clave;
    }
    
    public function getIdEventoRespuesta(){
        return $this->_idEventoRespuesta;
    }
    
    public function setIdPreguntaRespuesta($clave=null){
        $this->_idPreguntaRespuesta = $clave;
    }
    
    public function getIdPreguntaRespuesta(){
        return $this->_idPreguntaRespuesta;
    }
    
    public function setIdFormaRespuesta($clave=null){
        $this->_idFormaRespuesta = $clave;
    }
    
    public function getIdFormaRespuesta(){
        return $this->_idFormaRespuesta;
    }
    
    public function setIdUsuarioRespuesta($clave=null){
        $this->_idUsuarioRespuesta = $clave;
    }
    
    public function getIdUsuarioRespuesta(){
        return $this->_idUsuarioRespuesta;
    }
    
    public function setRespuesta($clave=null){
        $this->_respuesta = $clave;
    }
    
    public function getRespuesta(){
        return $this->_respuesta;
    }
    
    
    public function InsertaRespuesta($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEventoRespuesta(),$obj->getIdPreguntaRespuesta(),$obj->getIdFormaRespuesta()
                ,$obj->getIdUsuarioRespuesta(),$obj->getRespuesta());
                $lastId=$this->_objetoClassDAO->InsertaRespuestasApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
                
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaRespuesta($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEventoRespuesta(),$obj->getIdPreguntaRespuesta(),$obj->getIdFormaRespuesta()
                ,$obj->getIdUsuarioRespuesta(),$obj->getRespuesta(),$obj->getIdRespuesta());
                $this->_value = $this->_objetoClassDAO->ActualizarRespuestasApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarRespuesta($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdRespuesta());
                $this->_value = $this->_objetoClassDAO->EliminarRespuestasApp($this->_dataEntry);
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