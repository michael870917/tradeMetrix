<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/TablerosDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Tablero.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class TableroManager implements ManagerInterface{
    
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
        $this->_objetoClassDAO = new TablerosDAO();
        $this->_objetoClassBO = new Tablero();
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
            
    public function BuscaTablero($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoClassDAO->BusquedaTablerosApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoClassDAO->BusquedaTablerosApp($condicional);
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
            $objTablero->setIdTablero($value->idTablero);
            $objTablero->setIdReporteTablero($value->idReporteTablero);
            $objTablero->setReporteTablero($value->reporteTablero);
            $objTablero->setIdRolTablero($value->idRolTablero);
            $objTablero->setRolTablero($value->rolTablero);
            $objTablero->setIdVisualizacionTablero($value->idVisualizacionesTablero);
            $objTablero->setVisualizacionTablero($value->visualizacionTablero);
        }
        return $objTablero;
    }
        
    public function  FormaObjetoLista($array){
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Tablero();            
            $objMayor->setIdTablero($value->idTablero);
            $objMayor->setIdReporteTablero($value->idReporteTablero);
            $objMayor->setReporteTablero($value->reporteTablero);
            $objMayor->setIdRolTablero($value->idRolTablero);
            $objMayor->setRolTablero($value->rolTablero);
            $objMayor->setIdVisualizacionTablero($value->idVisualizacionesTablero);
            $objMayor->setVisualizacionTablero($value->visualizacionTablero);
            $read->setNuevoObjeto($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function InsertaTablero($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdRolTablero(),$obj->getIdReporteTablero(),$obj->getIdVisualizacionTablero());
                $lastId=$this->_objetoClassDAO->InsertaTableroApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaTablero($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdRolTablero(),$obj->getIdReporteTablero(),$obj->getIdVisualizacionTablero(),$obj->getIdTablero());
                $this->_value = $this->_objetoClassDAO->ActualizarTableroApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarTablero($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdTablero());
                $this->_value = $this->_objetoClassDAO->EliminarTableroApp($this->_dataEntry);
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
    
    public function setNuevoObjeto(Tablero $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}
?>