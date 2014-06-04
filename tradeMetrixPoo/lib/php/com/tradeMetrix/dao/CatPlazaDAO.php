<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("CatPlazaDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class CatPlazaDAO extends DaoAbstract implements InterfaceFuncionesCatPlaza{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorPlazaSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaCatPlazaApp($filtro=null){
        $this->_query = "select id as idPlaza,id_region as idRegionPlaza,distrito as distritoPlaza from cat_plaza
                ".($filtro != "" ? " WHERE ".$filtro : "");
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
    
        
    public function InsertaCatPlazaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCatPlaza();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCatPlaza(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCatPlaza(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarCatPlazaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposCatPlazaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatPlazaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaCatPlaza(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposCatPlazaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarCatPlazaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatPlazaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCatPlaza(),$this->_clave,$this->_contentArrayTabla->TipoCamposCatPlazaEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
}

?>