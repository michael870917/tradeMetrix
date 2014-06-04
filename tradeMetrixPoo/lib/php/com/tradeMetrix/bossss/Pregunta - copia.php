<?php

/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/PreguntaDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Respuesta.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Opcion.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class Pregunta{    
    private $_objetoAccionesValidacion;
    private $_objetoClassBO;
    private $_objetoClassDAO;
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;                
    private $_utilities;
    
    // value object pregunta
    private $_idPregunta;
    private $_idFormaPregunta;
    private $_idTipoPregunta;
    private $_tipoPregunta;
    private $_idTipoRespuestaPregunta;    
    private $_tipoRespuestaPregunta;
    private $_idClasificacionRespuestaPregunta;
    private $_clasificacionRespuestaPregunta;
    private $_pregunta;
    private $_listOpciones;
    private $_listRespuestas;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoClassDAO = new PreguntaDAO();        
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoClassDAO);                
        unset($this->_utilities);
    }
    
    public function setIdPregunta($clave=null){
        $this->_idPregunta = $clave;
    }
    
    public function getIdPregunta(){
        return $this->_idPregunta;
    }
    
    public function setIdFormaPregunta($clave=null){
        $this->_idFormaPregunta = $clave;
    }
    
    public function getIdFormaPregunta(){
        return $this->_idFormaPregunta;
    }
    
    public function setIdTipoPregunta($clave=null){
        $this->_idTipoPregunta = $clave;
    }
    
    public function getIdTipoPregunta(){
        return $this->_idTipoPregunta;
    }
    
    public function setTipoPregunta($clave=null){
        $this->_tipoPregunta = $clave;
    }
    
    public function getTipoPregunta(){
        return $this->_tipoPregunta;
    }

    public function setIdTipoRespuestaPregunta($clave=null){
        $this->_idTipoRespuestaPregunta = $clave;
    }
    
    public function getIdTipoRespuestaPregunta(){
        return $this->_idTipoRespuestaPregunta;
    }
    
    public function setTipoRespuestaPregunta($clave=null){
        $this->_tipoRespuestaPregunta = $clave;
    }
    
    public function getTipoRespuestaPregunta(){
        return $this->_tipoRespuestaPregunta;
    }
    
    public function setIdClasificacionRespuestaPregunta($clave=null){
        $this->_idClasificacionRespuestaPregunta = $clave;
    }
    
    public function getIdClasificacionRespuestaPregunta(){
        return $this->_idClasificacionRespuestaPregunta;
    }
    
    public function setClasificacionRespuestaPregunta($clave=null){
        $this->_clasificacionRespuestaPregunta = $clave;
    }
    
    public function getClasificacionRespuestaPregunta(){
        return $this->_clasificacionRespuestaPregunta;
    }

    public function setPregunta($clave=null){
        $this->_pregunta = $clave;
    }
    
    public function getPregunta(){
        return $this->_pregunta;
    }
    
    public function setListOpciones($clave=null){
        $this->_listOpciones = $clave;
    }
    
    public function getListOpciones(){
        return $this->_listOpciones;
    }
    
    public function setListRespuestas($clave=null){
        $this->_listRespuestas = $clave;
    }
    
    public function getListRespuestas(){
        return $this->_listRespuestas;
    }    
    
    
    public function InsertaPregunta($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdFormaPregunta(),$obj->getIdTipoPregunta(),$obj->getIdTipoRespuestaPregunta()
                ,$obj->getIdClasificacionRespuestaPregunta(),$obj->getPregunta());
                $lastId=$this->_objetoClassDAO->InsertaPreguntaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
                
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaPregunta($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdFormaPregunta(),$obj->getIdTipoPregunta(),$obj->getIdTipoRespuestaPregunta()
                ,$obj->getIdClasificacionRespuestaPregunta(),$obj->getPregunta(),$obj->getIdPregunta());
                $this->_value = $this->_objetoClassDAO->ActualizarPreguntaApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarPregunta($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdPregunta());
                $this->_value = $this->_objetoClassDAO->EliminarPreguntaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
    
    public function BuscaPreguntas($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $this->_retorno=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoClassDAO->BusquedaPreguntasApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaPreguntasApp($condicional);
            }
            
            if($tipoSalida == Constantes::OUTPUTSLISTA || $tipoSalida == ""){
                $this->_retorno = ($Rs !== false ? $this->FormaObjetoListaPreguntas($Rs) : false);    
            }elseif($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) > 0){
                $this->_retorno = ($Rs !== false ? $this->FormaObjetoSimplePreguntas($Rs) : false);    
            }    
        }
        return $this->_retorno;
    }
    
    
    
    public function FormaObjetoSimplePreguntas($array){
        $objTablero= new Pregunta();
        foreach($array AS $key => $value){
            $objTablero->setIdPregunta($value->idPregunta);
            $objTablero->setIdFormaPregunta($value->idFormaPregunta);
            $objTablero->setIdTipoPregunta($value->idTipoPregunta);
            $objTablero->setTipoPregunta($value->tipoPregunta);
            $objTablero->setIdTipoRespuestaPregunta($value->idTipoRespuestaPregunta);
            $objTablero->setTipoRespuestaPregunta($value->tipoRespuestaPregunta);
            $objTablero->setIdClasificacionRespuestaPregunta($value->idClasificacionRespuestaPregunta);
            $objTablero->setClasificacionRespuestaPregunta($value->clasificacionRespuestaPregunta);
            $objTablero->setPregunta($value->pregunta);
        }
        return $objTablero;
    }
    
    public function  FormaObjetoListaPreguntas($array){
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Pregunta();            
            $objMayor->setIdPregunta($value->idPregunta);
            $objMayor->setIdFormaPregunta($value->idFormaPregunta);
            $objMayor->setIdTipoPregunta($value->idTipoPregunta);
            $objMayor->setIdTipoRespuestaPregunta($value->idTipoRespuestaPregunta);
            $objMayor->setIdClasificacionRespuestaPregunta($value->idClasificacionRespuestaPregunta);
            $objMayor->setPregunta($value->pregunta);            
            $objMayor->setListRespuestas($this->BusquedaResp($value->idPregunta));            
            $read->setNuevoObjetoPregunta($objMayor);
            $read->cargarObjetos();
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function BusquedaResp($value){
        $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDPREGUNTATORESPUESTA,Constantes::IGUAL_DB,$value);
        $Rs=$this->_objetoClassDAO->BusquedaRespuestasApp($condicionalResp);
        $this->_retorno = ($Rs !== false ? $this->FormaObjetoListaRespuestas($Rs) : false);
        return $this->_retorno;
    }
    
    public function BusquedaOpc($value){
        $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDPREGUNTATOOPCIONES,Constantes::IGUAL_DB,$value);
        $Rs=$this->_objetoClassDAO->BusquedaOpcionesApp($condicionalResp);
        $this->_retorno = ($Rs !== false ? $this->FormaObjetoListaOpcion($Rs) : false);
        return $this->_retorno;
    }
    
    /*
    
    public function BuscaRespuestas($tipoSalida){
        if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida != "" && count($this->_propiedades) == 0)){
            $this->_retorno=false;
        }else{
            if($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaRespuestasApp($condicional);
            }
            $this->_retorno = ($Rs !== false && $tipoSalida == Constantes::OUTPUTSLISTA ? $this->FormaObjetoListaRespuestas($Rs) : false);
        }
        return $this->_retorno;
    }
    
    public function BuscaOpciones($tipoSalida){
        if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida != "" && count($this->_propiedades) == 0)){
            $this->_retorno=false;
        }else{
            if($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaOpcionesApp($condicional);
            }
            $this->_retorno = ($Rs !== false && $tipoSalida == Constantes::OUTPUTSLISTA ? $this->FormaObjetoListaOpcion($Rs) : false);
        }
        return $this->_retorno;
    }
    public function  FormaObjetoListaRespuestas($array){        
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Respuesta();            
            $objMayor->setIdRespuesta($value->idRespuesta);
            $objMayor->setIdEventoRespuesta($value->idEventoRespuesta);
            $objMayor->setIdPreguntaRespuesta($value->idPreguntaRespuesta);
            $objMayor->setIdFormaRespuesta($value->idFormaRespuesta);
            $objMayor->setIdUsuarioRespuesta($value->idUsuarioRespuesta);
            $objMayor->setRespuesta($value->respuesta);
            $read->setNuevoObjetoRespuesta($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function  FormaObjetoListaOpcion($array){
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Opcion();            
            $objMayor->setIdOpcion($value->idOpcion);
            $objMayor->setIdPreguntaOpcion($value->idPreguntaOpcion);
            $objMayor->setIdOpcionElegir($value->idOpcionElegir);
            $objMayor->setObservacionOpcion($value->observacionOpcion);
            $objMayor->setRequeridoOpcion($value->requeridoOpcion);            
            $read->setNuevoObjetoOpcion($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    */
}

class Lectura{
    private $_arregloObjetos = array();    
    public function cargarObjetos(){
        array_push($this->_arregloObjetos,$this->nuevoArreglo);
    }
    
    public function getListaObjetos(){
        return $this->_arregloObjetos;
    }
    
    public function setNuevoObjetoPregunta(Pregunta $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
    
    public function setNuevoObjetoRespuesta(Respuesta $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
    
    public function setNuevoObjetoOpcion(Opcion $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}

?>