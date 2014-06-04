<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/FormasDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Forma.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Pregunta.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class FormaManager implements ManagerInterface{
    
    private $_objetoAccionesValidacion;
    private $_objetoClassBO;
    private $_objetoClassDAO;
    private $_objetoClassPregunta;
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;                
    private $_utilities;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoClassDAO = new FormasDAO();
        $this->_objetoClassBO = new Forma();
        $this->_objetoClassPregunta = new Pregunta();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoClassDAO);
        unset($this->_objetoClassBO);
        unset($this->_objetoClassPregunta);
        unset($this->_utilities);
    }
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
            
    public function BuscaForma($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoClassDAO->BusquedaFormaApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaFormaApp($condicional);
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
        $objClassArm= $this->_objetoClassBO;
        foreach($array AS $key => $value){
            $objClassArm->setIdForma($value->idForma);
            $objClassArm->setIdActividadForma($value->idActividadForma);
            $objClassArm->setIdClasificacionForma($value->idClasificacionForma);
            $objClassArm->setClasificacionForma($value->clasificacionForma);
            $objClassArm->setNombreForma($value->nombreForma);
            $objClassArm->setStatusForma($value->statusForma);
            $objClassArm->setListPreguntasForma($this->BusquedaPreg($value->idForma));
        }
        return $objClassArm;
    }
        
    public function  FormaObjetoLista($array){
        $read = new LecturaForma();
        foreach($array as $key => $value){            
            $objMayor = new Forma();            
            $objMayor->setIdForma($value->idForma);
            $objMayor->setIdActividadForma($value->idActividadForma);
            $objMayor->setIdClasificacionForma($value->idClasificacionForma);
            $objMayor->setClasificacionForma($value->clasificacionForma);
            $objMayor->setNombreForma($value->nombreForma);
            $objMayor->setStatusForma($value->statusForma); 
            $objMayor->setListPreguntasForma($this->BusquedaPreg($value->idForma));            
            $read->setNuevoObjeto($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function BusquedaPreg($value){
        $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDFORMA,Constantes::IGUAL_DB,$value);
        $Rs=$this->_objetoClassPregunta->BusquedaPreg($condicionalResp);
        $this->_retorno = ($Rs !== false ? $Rs : false);
        return $this->_retorno;
    }
    
    public function BusquedaFormaAct($value){
        $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDFORMA,Constantes::IGUAL_DB,$value);
        $Rs=$this->_objetoClassDAO->BusquedaFormaApp($condicionalResp);
        $controlObjeto = ($Rs !== false ? $this->FormaObjetoSimple($Rs) : false);
        return $controlObjeto;
    }
    
    public function InsertaForma($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdClasificacionForma(),$obj->getNombreForma(),$obj->getStatusForma());
                $lastId=$this->_objetoClassDAO->InsertaFormaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaForma($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdClasificacionForma(),$obj->getNombreForma(),$obj->getStatusForma(),$obj->getIdForma());
                $this->_value = $this->_objetoClassDAO->ActualizarFormaApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarForma($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdForma());
                $this->_value = $this->_objetoClassDAO->EliminarFormaApp($this->_dataEntry);
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

class LecturaForma{
    private $_arregloObjetos = array();    
    public function cargarObjetos(){
        array_push($this->_arregloObjetos,$this->nuevoArreglo);
    }
    
    public function getListaObjetos(){
        return $this->_arregloObjetos;
    }
    
    public function setNuevoObjeto(Forma $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}
?>