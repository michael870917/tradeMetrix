<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/CampaniaDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Campania.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ReglaFotoRegistro.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ReglaInventario.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ReglaOtros.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Herramienta.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ActividadManagerBO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/EventoManagerBO.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class CampaniaManager implements ManagerInterface{
    
    private $_objetoAccionesValidacion;
    private $_objetoClassBO;
    private $_objetoClassActividadBO;
    private $_objetoClassDAO;
    private $_objetoClassEventoManager;
    private $_objetoClassHerramienta;
    private $_objetoClassReglaFotoRegistro;
    private $_objetoClassReglaInventario;
    private $_objetoClassReglaOtros;    
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;
    private $_utilities;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoClassDAO = new CampaniaDAO();
        $this->_objetoClassBO = new Campania();
        $this->_objetoClassActividadBO = new ActividadManager();
        $this->_objetoClassHerramienta = new Herramienta();
        $this->_objetoClassEventoManager = new EventoManager();
        $this->_objetoClassReglaFotoRegistro = new ReglaFotoRegistro();
        $this->_objetoClassReglaInventario = new ReglaInventario();
        $this->_objetoClassReglaOtros = new ReglaOtros();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoClassDAO);
        unset($this->_objetoClassBO);
        unset($this->_objetoClassActividadBO);
        unset($this->_objetoClassHerramienta);
        unset($this->_objetoClassEventoManager);
        unset($this->_objetoClassReglaFotoRegistro);
        unset($this->_objetoClassReglaInventario);
        unset($this->_objetoClassReglaOtros);
        unset($this->_utilities);
    }
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
            
    public function BuscaCampania($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoClassDAO->BusquedaCampaniaApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaCampaniaApp($condicional);
            }
            
            if($tipoSalida == Constantes::OUTPUTSLISTA || $tipoSalida == ""){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoLista($Rs) : false);    
            }elseif($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) > 0){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoSimple($Rs) : false);    
            }    
        }
        return $controlObjeto;
    }
    
    public function BusquedaCampaniaActividad($obj){
        if(is_object($obj)){
            $value=$obj->getIdActividad();
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDCAMPANIATOACTIVIDAD,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassActividadBO->BusquedaAct($condicionalResp);
            $this->_retorno = ($Rs !== false ? $Rs : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
    
    public function BusquedaCampaniaHerramienta($obj){
        if(is_object($obj)){
            $value=$obj->getIdHerramienta();
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ALIAS_IDCAMPANIATOHERRAMIENTA,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassDAO->BusquedaHerramientasToCampaniaApp($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $this->_objetoClassHerramienta->FormaObjetoListaHerramientaCampania($Rs) : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
        
    public function FormaObjetoSimple($array){
        $objClass= $this->_objetoClassBO;
        foreach($array AS $key => $value){
            $objClass->setIdCampania($value->idCampania);
            $objClass->setIdMarcaCampania($value->idMarcaCampania);
            $objClass->setMarcaCampania($value->marcaCampania);
            $objClass->setIdPlazaCampania($value->idPlazaCampania);
            $objClass->setPlazaCampania($value->plazaCampania);
            $objClass->setNombreCampania($value->nombreCampania);
            $objClass->setObjetivoCampania($value->objetivoCampania);
            $objClass->setObjetivoKpiCampania($value->objetivoKpiCampania);
            $objClass->setTypeKpiCampania($value->typeKpiCampania);
            $objClass->setFechaIniCampania($value->fechaIniCampania);
            $objClass->setFechaFinCampania($value->fechaFinCampania);
            $objClass->setActivoCampania($value->activoCampania);
        }
        return $objClass;
    }
        
    public function  FormaObjetoLista($array){
        $read = new LecturaCampania();
        foreach($array as $key => $value){
            $objMayor = new Campania();
            $objMayor->setIdCampania($value->idCampania);
            $objMayor->setIdMarcaCampania($value->idMarcaCampania);
            $objMayor->setMarcaCampania($value->marcaCampania);
            $objMayor->setIdPlazaCampania($value->idPlazaCampania);
            $objMayor->setPlazaCampania($value->plazaCampania);
            $objMayor->setNombreCampania($value->nombreCampania);
            $objMayor->setObjetivoCampania($value->objetivoCampania);
            $objMayor->setObjetivoKpiCampania($value->objetivoKpiCampania);
            $objMayor->setTypeKpiCampania($value->typeKpiCampania);
            $objMayor->setFechaIniCampania($value->fechaIniCampania);
            $objMayor->setFechaFinCampania($value->fechaFinCampania);
            $objMayor->setActivoCampania($value->activoCampania);
            $objMayor->setListActividadesCampania($this->BusquedaCampaniaToactividadSearch($value->idCampaniaActividad));
            $objMayor->setListHerramientaCampania($this->BusquedaCampaniaHerramientaSearch($objMayor->getIdCampania()));
            $objMayor->setListReglaFotoRegistroCampania($this->BusquedaCampaniaReglaFotoRegistroSearch($objMayor->getIdCampania()));
            $objMayor->setListReglaInventarioCampania($this->BusquedaCampaniaReglaInventarioSearch($objMayor->getIdCampania()));
            $objMayor->setListReglaOtrosCampania($this->BusquedaCampaniaReglaOtrosSearch($objMayor->getIdCampania()));
            $objMayor->setListEventosCampania($this->BusquedaCampaniaEventoSearch($objMayor->getIdCampania()));
            $read->setNuevoObjetoCampania($objMayor);
            $read->cargarObjetosCampania();
        }        
        $coleccion=$read->getListaObjetosCampania();
        return $coleccion;
    }
    
    public function BusquedaCampaniaEventoSearch($value){
        if($value != ""){                        
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDCAMPANIA,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassEventoManager->BuscaEventoSearch($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $Rs : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
    
    
    public function BusquedaCampaniaHerramientaSearch($value){
        if($value != ""){                        
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ALIAS_IDCAMPANIA,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassDAO->BusquedaHerramientasToCampaniaApp($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $this->_objetoClassHerramienta->FormaObjetoListaHerramientaCampania($Rs) : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
    
    public function BusquedaCampaniaReglaOtrosSearch($value){
        if($value != ""){                        
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ALIAS_IDCAMPANIA,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassDAO->BusquedaReglaOtrosToCampaniaApp($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $this->_objetoClassReglaOtros->FormaObjetoListaReglaOtrosCampania($Rs) : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
    
    public function BusquedaCampaniaReglaInventarioSearch($value){
        if($value != ""){                        
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ALIAS_IDCAMPANIA,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassDAO->BusquedaReglaInventarioToCampaniaApp($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $this->_objetoClassReglaInventario->FormaObjetoListaReglaInventarioCampania($Rs) : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
    
    public function BusquedaCampaniaReglaFotoRegistroSearch($value){
        if($value != ""){                        
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ALIAS_IDCAMPANIA,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassDAO->BusquedaReglaFotoRegistroToCampaniaApp($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $this->_objetoClassReglaFotoRegistro->FormaObjetoListaReglaFotoRegistroCampania($Rs) : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
    
    public function BusquedaCampaniaToactividadSearch($value){
        if($value != ""){            
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDCAMPANIA_CAMPANIATOACTIVIDAD,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassActividadBO->BusquedaAct($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $Rs : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
    
    public function BusquedaCampaniaToHerramientaSearch($value){
        if($value != ""){            
            $condicionalResp=$this->_objetoAccionesValidacion->WhereUnique(Constantes::ONLY_IDCAMPANIA_CAMPANIATOACTIVIDAD,Constantes::IGUAL_DB,$value);        
            $Rs=$this->_objetoClassActividadBO->BusquedaAct($condicionalResp);            
            $this->_retorno = ($Rs !== false ? $Rs : false);
        }else{
            $this->_retorno = false;
        }
        return $this->_retorno;
    }
        
    public function InsertaCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdMarcaCampania(),$obj->getNombreCampania(),$obj->getObjetivoCampania(),$obj->getObjetivoKpiCampania()
                ,$obj->getTypeKpiCampania(),$obj->getFechaIniCampania(),$obj->getFechaFinCampania(),$obj->getActivoCampania());
                $lastId=$this->_objetoClassDAO->InsertaCampaniaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaActividadCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampania(),$obj->getIdActividadCampania());
                $lastId=$this->_objetoClassDAO->InsertaActividadCampaniaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaPlazaCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdPlazaCampania(),$obj->getIdCampania(),$obj->getSimultaniedadCampania(),$obj->getActivacionesCampania(),$obj->getOutletsCampania());
                $lastId=$this->_objetoClassDAO->InsertaPlazaCampaniaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaFotoRegistroCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdTipoFoto(),$obj->getIdCampaniaFotoRegistro(),$obj->getCantidadFotoRegistro());
                $lastId=$this->_objetoClassDAO->InsertaReglaFotoRegistroCampaniaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaInventarioCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdProductoInventario(),$obj->getIdCampaniaInventario(),$obj->getUnitarioInventario(),$obj->getCantidadInventario());
                $lastId=$this->_objetoClassDAO->InsertaReglaInventarioCampaniaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaOtrosCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampaniaOtros(),$obj->getDescripcionOtros(),$obj->getCantidadOtros());
                $lastId=$this->_objetoClassDAO->InsertaReglaOtrosCampaniaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function InsertaHerramientaCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampaniaHerramienta(),$obj->getIdHerramienta());
                $lastId=$this->_objetoClassDAO->InsertaHerramientaCampaniaApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdMarcaCampania(),$obj->getNombreCampania(),$obj->getObjetivoCampania(),$obj->getObjetivoKpiCampania()
                ,$obj->getTypeKpiCampania(),$obj->getFechaIniCampania(),$obj->getFechaFinCampania(),$obj->getActivoCampania(),$obj->getIdCampania());
                $this->_value = $this->_objetoClassDAO->ActualizarCampaniaApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function ActualizaMarcaCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdMarcaCampania(),$obj->getIdCampania());
                $this->_value = $this->_objetoClassDAO->ActualizarMarcaCampaniaApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampania());
                $this->_value = $this->_objetoClassDAO->EliminarCampaniaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    
    public function EliminarActividadCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampania(),$obj->getIdActividadCampania());                
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDCAMPANIAS,Constantes::IGUAL_DB,$obj->getIdCampania());
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDACTIVIDAD,Constantes::IGUAL_DB,$obj->getIdActividadCampania());
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaActividadCampaniaApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarActividadCampaniaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $clavePrincipal : false);
        return $this->_id;
    }    
    
    public function EliminarPlazaCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdPlazaCampania(),$obj->getIdCampania());                
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDPLAZA,Constantes::IGUAL_DB,$obj->getIdPlazaCampania());
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDCAMPANIA,Constantes::IGUAL_DB,$obj->getIdCampania());
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaPlazaCampaniaApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarPlazaCampaniaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $clavePrincipal : false);
        return $this->_id;
    }
    
    public function EliminarReglaFotoRegistroCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdTipoFoto(),$obj->getIdCampaniaFotoRegistro());                
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDTIPOFOTO,Constantes::IGUAL_DB,$obj->getIdTipoFoto());
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDCAMPANIA,Constantes::IGUAL_DB,$obj->getIdCampaniaFotoRegistro());
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaReglaFotoRegistroCampaniaApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarReglaFotoRegistroCampaniaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $clavePrincipal : false);
        return $this->_id;
    }
    
    public function EliminarReglaInventarioCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdReglaInventario());                
                $this->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$obj->getIdReglaInventario());                
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaReglaInventarioCampaniaApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarReglaInventarioCampaniaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $clavePrincipal : false);
        return $this->_id;
    }
    
    public function EliminarReglaOtrosCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdReglaOtros());                
                $this->ArmarCondicional(Constantes::ONLY_IDGENERICO,Constantes::IGUAL_DB,$obj->getIdReglaOtros());                
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaReglaOtrosCampaniaApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarReglaOtrosCampaniaApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $clavePrincipal : false);
        return $this->_id;
    }
    
    public function EliminarHerramientaCampania($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdCampaniaHerramienta(),$obj->getIdHerramienta());                
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDCAMPANIA,Constantes::IGUAL_DB,$obj->getIdCampaniaHerramienta());
                $this->ArmarCondicional(Constantes::COMPARA_ONLY_IDHERRAMIENTA,Constantes::IGUAL_DB,$obj->getIdHerramienta());
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaHerramientasCampaniaApp($condicional);
                if($Rs != false){
                    foreach($Rs as $dataView){  $clavePrincipal = $dataView->id;    }                                       
                }else{
                    $this->_id = false;
                }
                $this->_value = $this->_objetoClassDAO->EliminarHerramientaCampaniaApp($this->_dataEntry);
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

class LecturaCampania{
    private $_arregloObjetosCampania = array();
    public function cargarObjetosCampania(){
        array_push($this->_arregloObjetosCampania,$this->nuevoArregloCampania);
    }
    
    public function getListaObjetosCampania(){
        return $this->_arregloObjetosCampania;
    }
    
    public function setNuevoObjetoCampania(Campania $objetoIncorporar){
        $this->nuevoArregloCampania=$objetoIncorporar;
    }
}
?>