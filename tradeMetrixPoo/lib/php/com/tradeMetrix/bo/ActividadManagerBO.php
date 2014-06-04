<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/ActividadDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Actividad.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/FormaManagerBO.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class ActividadManager implements ManagerInterface{
    
    private $_objetoAccionesValidacion;
    private $_objetoClassBO;
    private $_objetoClassDAO;
    private $_objetoClassFormaManager;
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;                
    private $_utilities;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoClassDAO = new ActividadDAO();
        $this->_objetoClassBO = new Actividad();
        $this->_objetoClassFormaManager = new FormaManager();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoClassDAO);
        unset($this->_objetoClassBO);
        unset($this->_objetoClassFormaManager);
        unset($this->_utilities);
    }
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
            
    public function BuscaActividad($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoClassDAO->BusquedaActividadApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaActividadApp($condicional);
            }
            
            if($tipoSalida == Constantes::OUTPUTSLISTA || $tipoSalida == ""){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoLista($Rs) : false);    
            }elseif($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) > 0){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoSimple($Rs) : false);    
            }    
        }
        return $controlObjeto;
    }
        
    public function FormaObjetoSimple($array){
        $objClass= $this->_objetoClassBO;
        foreach($array AS $key => $value){
            $objClass->setIdActividad($value->idActividad);
            $objClass->setIdTipoActividad($value->idTipoActividad);
            $objClass->setTipoActividad($value->actividad);
            $objClass->setIdClasificacionActividad($value->idClasificacionActividad);
            $objClass->setClasificacionActividad($value->clasificacion);
            $objClass->setDescripcionActividad($value->descripcionActividad);
            $objClass->setPrioridadActividad($value->prioridadActividad);
        }
        return $objClass;
    }
        
    public function  FormaObjetoLista($array){
        $read = new LecturaActividad();
        foreach($array as $key => $value){
            $objMayor = new Actividad();
            $objMayor->setIdActividad($value->idActividad);
            $objMayor->setIdTipoActividad($value->idTipoActividad);
            $objMayor->setTipoActividad($value->actividad);
            $objMayor->setIdClasificacionActividad($value->idClasificacionActividad);
            $objMayor->setClasificacionActividad($value->clasificacion);
            $objMayor->setDescripcionActividad($value->descripcionActividad);
            $objMayor->setPrioridadActividad($value->prioridadActividad);
            if($value->idTipoActividad == 1){$objMayor->setListFormaActividad($this->BusqForma($value->idFormaActividad));}else{$objMayor->setListFormaActividad(false);}
            $read->setNuevoObjetoActividad($objMayor);
            $read->cargarObjetosActividad();
        }        
        $coleccion=$read->getListaObjetosActividad();
        return $coleccion;
    }
    
    public function BusqForma($value){        
        $Rs=$this->_objetoClassFormaManager->BusquedaFormaAct($value);
        $this->_retorno = ($Rs !== false ? $Rs : false);
        return $this->_retorno;
    }
    
    public function BusquedaAct($value){          
        $Rs=$this->_objetoClassDAO->BusquedaActividadApp($value);        
        $this->_retorno = ($Rs !== false ? $this->FormaObjetoLista($Rs) : false);
        return $this->_retorno;
    }
    
    public function InsertaActividad($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdTipoActividad(),$obj->getIdClasificacionActividad(),$obj->getDescripcionActividad(),$obj->getPrioridadActividad());
                $lastId=$this->_objetoClassDAO->InsertaActividadApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaActividad($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdTipoActividad(),$obj->getIdClasificacionActividad(),$obj->getDescripcionActividad()
                ,$obj->getPrioridadActividad(),$obj->getIdActividad());
                $this->_value = $this->_objetoClassDAO->ActualizarActividadApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarActividad($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdActividad());
                $this->_value = $this->_objetoClassDAO->EliminarActividadApp($this->_dataEntry);
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

class LecturaActividad{
    private $_arregloObjetosActividad = array();
    public function cargarObjetosActividad(){
        array_push($this->_arregloObjetosActividad,$this->nuevoArregloActividad);
    }
    
    public function getListaObjetosActividad(){
        return $this->_arregloObjetosActividad;
    }
    
    public function setNuevoObjetoActividad(Actividad $objetoIncorporar){
        $this->nuevoArregloActividad=$objetoIncorporar;
    }
}
?>