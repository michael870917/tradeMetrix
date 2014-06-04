<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/CatPlazaDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Plaza.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class CatPlazaManager implements ManagerInterface{
    
    private $_objetoAccionesValidacion;
    private $_objetoUsuarioBO;
    private $_objetoUsuarioDAO;
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;                
    private $_utilities;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoCatalogoDAO = new CatPlazaDAO();
        $this->_objetoCatalogoBO = new Plaza();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoCatalogoDAO);
        unset($this->_objetoCatalogoBO);
        unset($this->_utilities);
    }
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
            
    public function BuscaCatalogo($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoCatalogoDAO->BusquedaCatPlazaApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoCatalogoDAO->BusquedaCatPlazaApp($condicional);
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
        $objManejador= $this->_objetoCatalogoBO;
        foreach($array AS $key => $value){
            $objManejador->setIdPlaza($value->idPlaza);
            $objManejador->setIdRegionPlaza($value->idRegionPlaza);
            $objManejador->setDistritoPlaza($value->distritoPlaza);
        }
        return $objManejador;
    }
        
    public function  FormaObjetoLista($array){
        $read = new Lectura();
        foreach($array as $key => $value){
            $objMayor = new Plaza();
            $objMayor->setIdPlaza($value->idPlaza);
            $objMayor->setIdRegionPlaza($value->idRegionPlaza);
            $objMayor->setDistritoPlaza($value->distritoPlaza);
            $read->setNuevoObjeto($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function InsertaCatPlaza($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdRegionPlaza(),$obj->getDistritoPlaza());
                $lastId=$this->_objetoCatalogoDAO->InsertaCatPlazaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaCatPlaza($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdRegionPlaza(),$obj->getDistritoPlaza(),$obj->getIdPlaza());
                $this->_value = $this->_objetoCatalogoDAO->ActualizarCatPlazaApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarCatPlaza($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdPlaza());
                $this->_value = $this->_objetoCatalogoDAO->EliminarCatPlazaApp($this->_dataEntry);
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

class Lectura{
    private $_arregloObjetos = array();    
    public function cargarObjetos(){
        array_push($this->_arregloObjetos,$this->nuevoArreglo);
    }
    
    public function getListaObjetos(){
        return $this->_arregloObjetos;
    }
    
    public function setNuevoObjeto(Plaza $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}
?>