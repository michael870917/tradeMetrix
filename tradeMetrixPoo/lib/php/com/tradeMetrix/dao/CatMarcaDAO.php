<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("CatMarcaDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class CatMarcaDAO extends DaoAbstract implements InterfaceFuncionesCatMarca{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorMarcaSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaCatMarcaApp($filtro=null){
        $this->_query = "select id as idMarca,marca as marca,acronimo as acronimoMarca,categoria as categoriaMarca from cat_marcas
                ".($filtro != "" ? " WHERE ".$filtro : "");
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
    
        
    public function InsertaCatMarcaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCatMarca();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCatMarca(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCatMarca(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarCatMarcaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposCatMarcaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatMarcaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaCatMarca(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposCatMarcaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarCatMarcaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatMarcaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCatMarca(),$this->_clave,$this->_contentArrayTabla->TipoCamposCatMarcaEliminacion(),$data);
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