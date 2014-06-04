<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("OpcionDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class OpcionDAO extends DaoAbstract implements InterfaceFuncionesOpcion{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorOpcionSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function InsertaOpcionesApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposOpcion();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaOpcion(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposOpcion(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
           
    public function ActualizarOpcionesApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposOpcionActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveOpcionActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaOpcion(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposOpcionActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarOpcionesApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveOpcionEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaOpcion(),$this->_clave,$this->_contentArrayTabla->TipoCamposOpcionEliminacion(),$data);
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