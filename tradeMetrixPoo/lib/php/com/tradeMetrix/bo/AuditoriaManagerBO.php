<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/AuditoriasDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Auditoria.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class AuditoriaManager implements ManagerInterface{
    
    private $_objetoAccionesValidacion;
    private $_objetoClassBO;
    private $_objetoClassDAO;
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;                
    private $_utilities;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoClassDAO = new AuditoriasDAO();
        $this->_objetoClassBO = new Auditoria();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoClassDAO);
        unset($this->_objetoClassBO);
        unset($this->_utilities);
    }
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
            
    public function BuscaAuditoria($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoClassDAO->BusquedaAuditoriaApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaAuditoriaApp($condicional);
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
        $objTablero= $this->_objetoClassBO;
        foreach($array AS $key => $value){
            $objTablero->setIdAuditoria($value->idAuditoria);
            $objTablero->setFechaAuditoria($value->fechaAuditoria);
            $objTablero->setPeriodoIniAuditoria($value->periodoIniAuditoria);
            $objTablero->setPeriodoFinAuditoria($value->periodoFinAuditoria);
            $objTablero->setIdUsuarioAuditoria($value->idUsuarioAuditoria);
            $objTablero->setUsuarioAuditoria($value->usuarioAuditoria);
            $objTablero->setIdEventoAuditoria($value->ideventoAuditoria);
        }
        return $objTablero;
    }
        
    public function  FormaObjetoLista($array){
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Auditoria();            
            $objMayor->setIdAuditoria($value->idAuditoria);
            $objMayor->setFechaAuditoria($value->fechaAuditoria);
            $objMayor->setPeriodoIniAuditoria($value->periodoIniAuditoria);
            $objMayor->setPeriodoFinAuditoria($value->periodoFinAuditoria);
            $objMayor->setIdUsuarioAuditoria($value->idUsuarioAuditoria);
            $objMayor->setUsuarioAuditoria($value->usuarioAuditoria);
            $objMayor->setIdEventoAuditoria($value->ideventoAuditoria);
            $read->setNuevoObjeto($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function InsertaAuditoria($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getFechaAuditoria(),$obj->getPeriodoIniAuditoria(),$obj->getPeriodoFinAuditoria());
                $lastId=$this->_objetoClassDAO->InsertaAuditoriaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaUsuarioAuditoria($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdAuditoria(),$obj->getIdUsuarioAuditoria());
                $lastId=$this->_objetoClassDAO->InsertaUsuarioAuditoriaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaAuditoria($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getFechaAuditoria(),$obj->getPeriodoIniAuditoria(),$obj->getPeriodoFinAuditoria(),$obj->getIdAuditoria());
                $this->_value = $this->_objetoClassDAO->ActualizarAuditoriaApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarAuditoria($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdAuditoria());
                $this->_value = $this->_objetoClassDAO->EliminarAuditoriaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarUsuarioAuditoria($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdAuditoria(),$obj->getIdUsuarioAuditoria());                
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDAUDITORIA,Constantes::IGUAL_DB,$obj->getIdAuditoria());
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDUSUARIOS,Constantes::IGUAL_DB,$obj->getIdUsuarioAuditoria());
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaUsuarioAuditoriaApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarUsuarioAuditoriaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $clavePrincipal : false);
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
    
    public function setNuevoObjeto(Auditoria $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}
?>