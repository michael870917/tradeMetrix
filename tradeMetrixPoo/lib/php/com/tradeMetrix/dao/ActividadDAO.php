<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("ActividadDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class ActividadDAO extends DaoAbstract implements InterfaceFuncionesActividad{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorActividadSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaActividadApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT actividades.id as idActividad,id_tipo_actividad as idTipoActividad,actividad,id_clasif as idClasificacionActividad,clasificacion
                ,descripcion as descripcionActividad,prioridad as prioridadActividad,actividades_to_formas.id_forma as idFormaActividad
                FROM
                actividades
                INNER JOIN cat_tipo_actividad ON cat_tipo_actividad.id=actividades.id_tipo_actividad
                INNER JOIN clasif_actividad ON clasif_actividad.id=actividades.id_clasif
                INNER JOIN actividades_to_formas ON actividades_to_formas.id_actividad=actividades.id
                INNER JOIN campanias_to_actividades ON campanias_to_actividades.id_actividades=actividades.id
                ".
                ($filtro != "" ? " WHERE ".$filtro : "")        
                .")as a"; 
                
                //echo $this->_query.'<br><br>';               
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
        
    public function InsertaActividadApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposActividad();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaActividad(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposActividad(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function ActualizarActividadApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposActividadActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveActividadActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaActividad(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposActividadActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarActividadApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveActividadEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaActividad(),$this->_clave,$this->_contentArrayTabla->TipoCamposActividadEliminacion(),$data);
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