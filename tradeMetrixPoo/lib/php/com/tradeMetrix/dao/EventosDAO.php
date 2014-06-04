<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("EventosDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class EventosDAO extends DaoAbstract implements InterfaceFuncionesEventos{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorEventosSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaEventoApp($filtro=null){
        $this->_query = "SELECT 
                idEvento,idCampaniaEvento,idCCEvento,fechaEvento,horainiEvento,horafinEvento,activoEvento,nombreCCEvento
                FROM
                (
                SELECT evento.id as idEvento,evento.id_campania as idCampaniaEvento,evento.id_cc as idCCEvento,DATE(evento.fecha) as fechaEvento
                ,evento.hora_ini as horainiEvento,evento.hora_fin as horafinEvento,evento.activo as activoEvento,cat_cc.nombre_cc as nombreCCEvento
                FROM evento
                INNER JOIN campanias ON campanias.id=evento.id_campania
                INNER JOIN cat_cc ON cat_cc.id=evento.id_cc
                INNER JOIN evento_to_usuarios ON evento_to_usuarios.id_evento=evento.id
                INNER JOIN cat_plaza ON cat_plaza.id=cat_cc.id_plaza
                INNER JOIN cat_marcas ON cat_marcas.id=campanias.id_marca
                INNER JOIN region_to_usuarios ON region_to_usuarios.id_usuario=evento_to_usuarios.id_usuario
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
    
    
    public function BusquedaEventoToUsuarioApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    evento_to_usuarios
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
        
    public function InsertaEventoApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposEvento();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaEvento(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposEvento(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
   
    public function InsertaEventoToUsuarioApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposEventoToUsuario();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaEventoToUsuario(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposEventoToUsuario(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaEventoToReglasFotoRegistroApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposEventoToReglasFotoRegistro();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaEventoToReglasFotoRegistro(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposEventoToReglasFotoRegistro(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaEventoToReglasInventarioApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposEventoToReglasInventario();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaEventoToReglasInventario(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposEventoToReglasInventario(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaEventoToReglasOtrosApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposEventoToReglasOtros();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaEventoToReglasOtros(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposEventoToReglasOtros(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarEventoApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposEventoActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveEventoActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaEvento(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposEventoActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function ActualizarEventoIdCCApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposEventoIdCCActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveEventoIdCCActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaEvento(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposEventoIdCCActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarEventoApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveEventoEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaEvento(),$this->_clave,$this->_contentArrayTabla->TipoCamposEventoEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarEventoToUsuarioApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveEventoToUsuarioEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaEventoToUsuario(),$this->_clave,$this->_contentArrayTabla->TipoCamposEventoToUsuarioEliminacion(),$data);
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