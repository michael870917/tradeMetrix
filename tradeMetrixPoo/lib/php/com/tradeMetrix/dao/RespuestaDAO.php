<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("RespuestasDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class RespuestaDAO extends DaoAbstract implements InterfaceFuncionesRespuesta{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorRespuestasSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function InsertaRespuestasApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposRespuestas();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaRespuestas(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposRespuestas(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
           
    public function ActualizarRespuestasApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposRespuestasActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveRespuestasActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaRespuestas(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposRespuestasActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarRespuestasApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveRespuestasEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaRespuestas(),$this->_clave,$this->_contentArrayTabla->TipoCamposRespuestasEliminacion(),$data);
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