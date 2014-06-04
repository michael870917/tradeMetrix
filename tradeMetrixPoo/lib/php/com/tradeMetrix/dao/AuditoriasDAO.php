<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("AuditoriasDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class AuditoriasDAO extends DaoAbstract implements InterfaceFuncionesAuditorias{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorAuditoriaSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaAuditoriaApp($filtro=null){
        $this->_query = "SELECT * 
	FROM
	(
	SELECT
	auditoria.id as idAuditoria,DATE(fecha_auditoria) as fechaAuditoria,auditoria.fecha_ini as periodoIniAuditoria
	,auditoria.fecha_fin as periodoFinAuditoria,auditoria_to_usuarios.id as idUsuarioAuditoria  
	,usuarios.nombre as usuarioAuditoria,id_evento ideventoAuditoria
	FROM
	auditoria
	INNER JOIN auditoria_to_evento ON auditoria_to_evento.id_auditoria=auditoria.id
	INNER JOIN auditoria_to_usuarios ON auditoria_to_usuarios.id_auditoria=auditoria.id
	INNER JOIN usuarios ON usuarios.id=auditoria_to_usuarios.id_usuarios
	INNER JOIN evento ON evento.id=auditoria_to_evento.id_evento
	INNER JOIN campanias ON campanias.id=evento.id_campania
	INNER JOIN cc_to_usuarios ON cc_to_usuarios.id_usuario=auditoria_to_usuarios.id_usuarios
	INNER JOIN cat_cc ON cat_cc.id=cc_to_usuarios.id_cc
	INNER JOIN cat_plaza ON cat_plaza.id=cat_cc.id_plaza

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
    
    
    public function BusquedaUsuarioAuditoriaApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    auditoria_to_usuarios
                ".
                ($filtro != "" ? " WHERE ".$filtro : "");
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
        
    public function InsertaAuditoriaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposAuditoria();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaAuditoria(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposAuditoria(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaUsuarioAuditoriaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposUsuarioAuditoria();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaUsuarioAuditoria(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposUsuarioAuditoria(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarAuditoriaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposAuditoriaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveAuditoriaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaAuditoria(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposAuditoriaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarAuditoriaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveAuditoriaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaAuditoria(),$this->_clave,$this->_contentArrayTabla->TipoCamposAuditoriaEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarUsuarioAuditoriaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioAuditoriaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaUsuarioAuditoria(),$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioAuditoriaEliminacion(),$data);
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