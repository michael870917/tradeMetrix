<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("CatGenericoDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class CatTipoFotoDAO extends DaoAbstract implements InterfaceFuncionesCatalogoGenerico{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorCatalogoGenericoSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaCatalogoApp($filtro=null){
        $this->_query = "SELECT id as idCatalogo,tipo_foto as descripcionCatalogo FROM cat_tipo_foto
                ".($filtro != "" ? " WHERE ".$filtro : "");
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
    
        
    public function InsertaCatalogoApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCatTipoFotoInsercion();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCatTipoFoto(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCatGenerico(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarCatalogoApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposCatTipoFotoActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatalogoActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaCatTipoFoto(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposCatGenericoActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarCatalogoApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCatalogoEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCatTipoFoto(),$this->_clave,$this->_contentArrayTabla->TipoCamposCatGenericoEliminacion(),$data);
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