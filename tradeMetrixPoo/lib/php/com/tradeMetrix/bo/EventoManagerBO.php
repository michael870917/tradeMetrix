<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/EventosDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Evento.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class EventoManager implements ManagerInterface{
    
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
        $this->_objetoClassDAO = new EventosDAO();
        $this->_objetoClassBO = new Evento();
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
            
    public function BuscaEvento($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoClassDAO->BusquedaEventoApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaEventoApp($condicional);
            }
            
            if($tipoSalida == Constantes::OUTPUTSLISTA || $tipoSalida == ""){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoLista($Rs) : false);    
            }elseif($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) > 0){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoSimple($Rs) : false);    
            }    
        }
        return $controlObjeto;
    }
    
    
    public function BuscaEventoSearch($value){
        if($value != ""){
            $Rs=$this->_objetoClassDAO->BusquedaEventoApp($value);
            $controlObjeto = ($Rs !== false ? $this->FormaObjetoLista($Rs) : false);    
        }else{
            $controlObjeto = false;
        }
        return $controlObjeto;
    }
        
    public function FormaObjetoSimple($array){
        $objTablero= $this->_objetoClassBO;
        foreach($array AS $key => $value){
            $objTablero->setIdEvento($value->idEvento);
            $objTablero->setIdCampaniaEvento($value->idCampaniaEvento);
            $objTablero->setIdCCEvento($value->idCCEvento);
            $objTablero->setNombreCCEvento($value->nombreCCEvento);
            $objTablero->setFechaEvento($value->fechaEvento);
            $objTablero->setHorainiEvento($value->horainiEvento);
            $objTablero->setHorafinEvento($value->horafinEvento);
            $objTablero->setActivoEvento($value->activoEvento);
        }
        return $objTablero;
    }
        
    public function  FormaObjetoLista($array){
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Evento();            
            $objMayor->setIdEvento($value->idEvento);
            $objMayor->setIdCampaniaEvento($value->idCampaniaEvento);
            $objMayor->setIdCCEvento($value->idCCEvento);
            $objMayor->setNombreCCEvento($value->nombreCCEvento);
            $objMayor->setFechaEvento($value->fechaEvento);
            $objMayor->setHorainiEvento($value->horainiEvento);
            $objMayor->setHorafinEvento($value->horafinEvento);
            $objMayor->setActivoEvento($value->activoEvento);
            $read->setNuevoObjeto($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function InsertaEvento($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampaniaEvento(),$obj->getIdCCEvento(),$obj->getFechaEvento(),$obj->getHorainiEvento()
                ,$obj->getHorafinEvento(),$obj->getActivoEvento());
                $lastId=$this->_objetoClassDAO->InsertaEventoApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaEventoToUsuario($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEvento(),$obj->getIdUsuarioToEvento());
                $lastId=$this->_objetoClassDAO->InsertaEventoToUsuarioApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaEventoToReglasFotoRegistro($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEvento(),$obj->getIdReglaToEvento(),$obj->getCumplirToEvento());
                $lastId=$this->_objetoClassDAO->InsertaEventoToReglasFotoRegistroApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaEventoToReglasInventario($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEvento(),$obj->getIdReglaToEvento(),$obj->getCumplirToEvento());
                $lastId=$this->_objetoClassDAO->InsertaEventoToReglasInventarioApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaEventoToReglasOtros($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEvento(),$obj->getIdReglaToEvento(),$obj->getCumplirToEvento());
                $lastId=$this->_objetoClassDAO->InsertaEventoToReglasOtrosApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaEvento($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampaniaEvento(),$obj->getIdCCEvento(),$obj->getFechaEvento(),$obj->getHorainiEvento()
                ,$obj->getHorafinEvento(),$obj->getActivoEvento(),$obj->getIdEvento());
                $this->_value = $this->_objetoClassDAO->ActualizarEventoApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function ActualizaEventoIdCC($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCCEvento(),$obj->getIdEvento());
                $this->_value = $this->_objetoClassDAO->ActualizarEventoIdCCApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarEvento($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEvento());
                $this->_value = $this->_objetoClassDAO->EliminarEventoApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarEventoToUsuario($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdEvento(),$obj->getIdUsuarioToEvento());                
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDEVENTO,Constantes::IGUAL_DB,$obj->getIdEvento());
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDUSUARIO,Constantes::IGUAL_DB,$obj->getIdUsuarioToEvento());
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaEventoToUsuarioApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarEventoToUsuarioApp($this->_dataEntry);
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
    
    public function setNuevoObjeto(Evento $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}
?>