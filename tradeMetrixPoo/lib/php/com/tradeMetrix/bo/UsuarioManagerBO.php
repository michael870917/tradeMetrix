<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/UsuariosDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Usuario.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class UsuarioManager implements ManagerInterface{
    
    private $_objetoAccionesValidacion;
    private $_objetoUsuarioBO;
    private $_objetoUsuarioDAO;
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;                
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoUsuarioDAO = new UsuariosDAO();
        $this->_objetoUsuarioBO = new Usuario();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoUsuarioDAO);
        unset($this->_objetoUsuarioBO);
    }
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
            
    public function BuscaUsuario($tipoSalida){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoUsuarioDAO->BusquedaUsuariosApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoUsuarioDAO->BusquedaUsuariosApp($condicional);
            }
            
            if($tipoSalida == Constantes::OUTPUTSLISTA || $tipoSalida == ""){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoLista($Rs) : false);    
            }elseif($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) > 0){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoSimple($Rs) : false);    
            }    
        }
        return $controlObjeto;
    }
    
    public function LoginUsuario($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $Rs = $this->_objetoUsuarioDAO->LoginUsuarioApp($obj->getUsuario(),$obj->getClaveUsuario());
                $controlObjeto = ($Rs !== null || $Rs !== "" || $Rs !== false ? $this->FormaObjetoLogin($Rs) : "false");
            }
        }
        return $controlObjeto;
    }
    
    public function FormaObjetoLogin($array){
        $objUser = $this->_objetoUsuarioBO;        
        foreach($array as $key => $value){
            $objUser->setIdUsuario($value->idUsuario);
            $objUser->setNombreUsuario($value->nombreUsuario);
            $objUser->setUsuario($value->usuario);            
            $objUser->setClaveUsuario($value->claveUsuario);
            $objUser->setEmailUsuario($value->emailUsuario);
            $objUser->setTelcelUsuario($value->telcelUsuario);
            $objUser->setTelcasaUsuario($value->telcasaUsuario);
            $objUser->setFotoUsuario($value->fotoUsuario);
            $objUser->setDomicilioUsuario($value->domicilioUsuario);
            $objUser->setIdRolUsuario($value->idRolUsuario);
            $objUser->setRolUsuario($value->rolUsuario);            
        }
        return $objUser;
    }
    
    public function FormaObjetoSimple($array){
        $objUser= $this->_objetoUsuarioBO;
        foreach($array AS $key => $value){
            $objUser->setIdUsuario($value->idUsuario);
            $objUser->setIdRolUsuario($value->idRolUsuario);
            $objUser->setRolUsuario($value->rolUsuario);
            $objUser->setIdPlazaUsuario($value->idPlazaUsuario);
            $objUser->setPlazaUsuario($value->plazaUsuario);
            $objUser->setIdRegionUsuario($value->idRegionUsuario);
            $objUser->setRegionUsuario($value->regionUsuario);
            $objUser->setIdCCUsuario($value->idCCUsuario);
            $objUser->setCCUsuario($value->ccUsuario);
            $objUser->setIdMarcaUsuario($value->idMarcaUsuario);
            $objUser->setMarcaUsuario($value->marcaUsuario );
            $objUser->setNombreUsuario($value->nombreUsuario);
            $objUser->setUsuario($value->usuario);
            $objUser->setClaveUsuario($value->claveUsuario);
            $objUser->setEmailUsuario($value->emailUsuario);
            $objUser->setTelcelUsuario($value->telcelUsuario);
            $objUser->setTelcasaUsuario($value->telcasaUsuario);
            $objUser->setFotoUsuario($value->fotoUsuario);
            $objUser->setDomicilioUsuario($value->domicilioUsuario);
        }
        return $objUser;
    }
        
    public function  FormaObjetoLista($array){
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Usuario();            
            $objMayor->setIdUsuario($value->idUsuario);                                        
            $objMayor->setIdRolUsuario($value->idRolUsuario);
            $objMayor->setRolUsuario($value->rolUsuario);
            $objMayor->setIdPlazaUsuario($value->idPlazaUsuario);
            $objMayor->setPlazaUsuario($value->plazaUsuario);
            $objMayor->setIdRegionUsuario($value->idRegionUsuario);
            $objMayor->setRegionUsuario($value->regionUsuario);
            $objMayor->setIdCCUsuario($value->idCCUsuario);
            $objMayor->setCCUsuario($value->ccUsuario);
            $objMayor->setIdMarcaUsuario($value->idMarcaUsuario);
            $objMayor->setMarcaUsuario($value->marcaUsuario );
            $objMayor->setNombreUsuario($value->nombreUsuario);
            $objMayor->setUsuario($value->usuario);
            $objMayor->setClaveUsuario($value->claveUsuario);
            $objMayor->setEmailUsuario($value->emailUsuario);
            $objMayor->setTelcelUsuario($value->telcelUsuario);
            $objMayor->setTelcasaUsuario($value->telcasaUsuario);
            $objMayor->setFotoUsuario($value->fotoUsuario);
            $objMayor->setDomicilioUsuario($value->domicilioUsuario);
            $read->setNuevoObjeto($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
        
    public function InsertaUsuario($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getNombreUsuario(),$obj->getUsuario(),$obj->getClaveUsuario(),$obj->getEmailUsuario()
                ,$obj->getTelcelUsuario(),$obj->getTelcasaUsuario(),$obj->getFotoUsuario(),$obj->getDomicilioUsuario());
                $lastId=$this->_objetoUsuarioDAO->InsertaUsuariosApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaUsuarioRol($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){                
                $this->_dataEntry=array($obj->getIdRolUsuario(),$obj->getIdUsuario());
                $lastId=$this->_objetoUsuarioDAO->InsertaUsuarioRolApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaUsuarioPlaza($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){                
                $this->_dataEntry=array($obj->getIdPlazaUsuario(),$obj->getIdUsuario());
                $lastId=$this->_objetoUsuarioDAO->InsertaUsuarioPlazaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
        
    public function InsertaUsuarioCC($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){                
                $this->_dataEntry=array($obj->getIdCCUsuario(),$obj->getIdUsuario());
                $lastId=$this->_objetoUsuarioDAO->InsertaUsuarioCCApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaUsuarioRegion($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){                
                $this->_dataEntry=array($obj->getIdRegionUsuario(),$obj->getIdUsuario());
                $lastId=$this->_objetoUsuarioDAO->InsertaUsuarioRegionApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaUsuarioMarca($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){                
                $this->_dataEntry=array($obj->getIdMarcaUsuario(),$obj->getIdUsuario());
                $lastId=$this->_objetoUsuarioDAO->InsertaUsuarioMarcaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaUsuario($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getNombreUsuario(),$obj->getUsuario(),$obj->getClaveUsuario(),$obj->getEmailUsuario()
                ,$obj->getTelcelUsuario(),$obj->getTelcasaUsuario(),$obj->getFotoUsuario(),$obj->getDomicilioUsuario(),$obj->getIdUsuario());
                $this->_value = $this->_objetoUsuarioDAO->ActualizarUsuarioApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarUsuario($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdUsuario());
                $this->_value = $this->_objetoUsuarioDAO->EliminarUsuarioApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarUsuarioRol($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdRolUsuario(),$obj->getIdUsuario());
                $this->_value = $this->_objetoUsuarioDAO->EliminarUsuarioRolApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarUsuarioPlaza($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdPlazaUsuario(),$obj->getIdUsuario());
                $this->_value = $this->_objetoUsuarioDAO->EliminarUsuarioPlazaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarUsuarioCC($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCCUsuario(),$obj->getIdUsuario());
                $this->_value = $this->_objetoUsuarioDAO->EliminarUsuarioCCApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarUsuarioRegion($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdRegionUsuario(),$obj->getIdUsuario());
                $this->_value = $this->_objetoUsuarioDAO->EliminarUsuarioRegionApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarUsuarioMarca($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdMarcaUsuario(),$obj->getIdUsuario());
                $this->_value = $this->_objetoUsuarioDAO->EliminarUsuarioMarcaApp($this->_dataEntry);
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
    
    public function setNuevoObjeto(Usuario $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}
?>