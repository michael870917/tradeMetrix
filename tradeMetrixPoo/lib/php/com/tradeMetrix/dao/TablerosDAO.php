<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("TablerosDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class TablerosDAO extends DaoAbstract implements InterfaceFuncionesTableros{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorTableroSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaTablerosApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT tableros.id as idTablero,reporte.id as idReporteTablero,reporte as reporteTablero,cat_roles.id as idRolTablero,rol as rolTablero
                ,cat_visualizaciones.id as idVisualizacionesTablero,visualizacion as visualizacionTablero
                FROM tableros
                INNER JOIN reporte ON reporte.id=tableros.id_reporte
                INNER JOIN cat_roles ON cat_roles.id=tableros.id_rol
                INNER JOIN cat_visualizaciones on cat_visualizaciones.id=tableros.`id_visualización`
                ".
                ($filtro != "" ? " WHERE ".$filtro : "")        
                .")as a";                
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
    
        
    public function InsertaTableroApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposTablero();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaTablero(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposTablero(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarTableroApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposTableroActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveTableroActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaTablero(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposTableroActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarTableroApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveTableroEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaTablero(),$this->_clave,$this->_contentArrayTabla->TipoCamposTableroEliminacion(),$data);
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