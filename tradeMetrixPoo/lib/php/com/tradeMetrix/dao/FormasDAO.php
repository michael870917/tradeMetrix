<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("FormasDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class FormasDAO extends DaoAbstract implements InterfaceFuncionesFormas{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorFormaSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaFormaApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT 
                formas.id as idForma,actividades_to_formas.id_actividad as idActividadForma,id_clasif as idClasificacionForma
                ,clasif_formas.clasificacion as clasificacionForma,nombre_forma as nombreForma,estatus as statusForma
                
                from formas
                INNER JOIN clasif_formas ON clasif_formas.id=formas.id_clasif
                INNER JOIN actividades_to_formas ON actividades_to_formas.id_forma=formas.id
                ".
                ($filtro != "" ? " WHERE ".$filtro : "")        
                .")as a";
        //echo $this->_query;        
                                
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
        
    public function InsertaFormaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposForma();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaForma(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposForma(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function ActualizarFormaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposFormaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveFormaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaForma(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposFormaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarFormaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveFormaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaForma(),$this->_clave,$this->_contentArrayTabla->TipoCamposFormaEliminacion(),$data);
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