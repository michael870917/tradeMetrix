<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("CentroConsumoDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class CatCCDAO extends DaoAbstract implements InterfaceFuncionesCatCC{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorCCSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaCatCCApp($filtro=null){
        $this->_query = "SELECT 
                cat_cc.id as idCC,id_plaza as idPlazaCC,nombre_cc as nombreCC,geo_lng as geolngCC,geo_lat as geolatCC
                ,direccion as direccionCC,aforo as aforoCC 
                FROM
                cat_cc
                INNER JOIN cat_plaza ON cat_plaza.id=cat_cc.id_plaza
                INNER JOIN cat_region ON cat_region.id=cat_plaza.id_region
                ".($filtro != "" ? " WHERE ".$filtro : "");
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
    
        
    public function InsertaCatCCApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCatCC();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCatCC(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCatCC(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarCatCCApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposCatCCActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatCCActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaCatCC(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposCatCCActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarCatCCApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatCCEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCatCC(),$this->_clave,$this->_contentArrayTabla->TipoCamposCatCCEliminacion(),$data);
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