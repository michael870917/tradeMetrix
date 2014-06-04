<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("UsuariosDataDAO.php");
include_once ("InterfacesDAO.php");
class UsuariosDAO extends DaoAbstract implements InterfaceFuncionesUsuarios{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorUsuarioSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaUsuariosApp($filtro=null){
        $this->_query = "SELECT *
FROM
(
SELECT 
usuarios.id as idUsuario
,usuarios.nombre as nombreUsuario,usuarios.usuario as usuario,usuarios.clave as claveUsuario,usuarios.email as emailUsuario
,usuarios.tel_cel as telcelUsuario,usuarios.tel_casa as telcasaUsuario,usuarios.foto as fotoUsuario,usuarios.domicilio as domicilioUsuario
,cat_roles.id as idRolUsuario,cat_roles.rol as rolUsuario
FROM usuarios
INNER JOIN usuarios_to_roles ON usuarios_to_roles.id_usuario=usuarios.id
INNER JOIN cat_roles ON cat_roles.id=usuarios_to_roles.id_rol
)as a
LEFT JOIN
(SELECT 
cat_plaza.id as idPlazaUsuario
,cat_plaza.distrito as plazaUsuario 
,plaza_to_usuarios.id_usuario as idUsuarioPLaza
,cat_plaza.id_region
from
plaza_to_usuarios
INNER JOIN cat_plaza ON cat_plaza.id = plaza_to_usuarios.id_plaza
) AS b ON b.idUsuarioPLaza=a.idUsuario
LEFT JOIN
(
SELECT 
cat_region.id as idRegionUsuario,cat_region.region as regionUsuario
FROM cat_region
) AS c ON b.id_region=c.idRegionUsuario
LEFT JOIN
(
SELECT 
cat_cc.id as idCCUsuario,cat_cc.nombre_cc as ccUsuario,cc_to_usuarios.id_usuario idUsuarioCC
from cc_to_usuarios
INNER JOIN cat_cc ON cat_cc.id=cc_to_usuarios.id_cc 
) AS d ON d.idUsuarioCC=a.idUsuario
LEFT JOIN
(
SELECT 
cat_marcas.id as idMarcaUsuario,cat_marcas.marca as marcaUsuario ,marcas_to_usuarios.id_usuario as idUsuarioMarca
from marcas_to_usuarios
INNER JOIN cat_marcas ON cat_marcas.id=marcas_to_usuarios.id_marca
) AS e ON e.idUsuarioMarca=a.idUsuario
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
    
    public function LoginUsuarioApp($username,$password){        
        $this->_query="SELECT 
            idUsuario,nombreUsuario,usuario,claveUsuario,emailUsuario,telcelUsuario,telcasaUsuario,fotoUsuario,domicilioUsuario,idRolUsuario,rolUsuario
            FROM
            (
            SELECT u.id as idUsuario,nombre as nombreUsuario,usuario,clave as claveUsuario,email as emailUsuario,tel_cel as telcelUsuario
            ,tel_casa as telcasaUsuario,foto as fotoUsuario,domicilio as domicilioUsuario,cr.id as idRolUsuario,rol as rolUsuario FROM usuarios u
            INNER JOIN usuarios_to_roles utr ON utr.id_usuario = u.id
            INNER JOIN cat_roles cr ON cr.id = utr.id_rol
            WHERE usuario='$username' and clave ='$password'
            )as a";
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;    
    }
    
    
    
    
        
    public function InsertaUsuariosApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposUsuario();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaUsuario(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposUsuario(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaUsuarioRolApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposUsuarioRol();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaUsuarioRol(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposUsuarioRol(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaUsuarioPlazaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposUsuarioPlaza();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaUsuarioPlaza(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposUsuarioPlaza(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaUsuarioCCApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposUsuarioCC();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaUsuarioCC(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposUsuarioCC(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
   
    public function InsertaUsuarioRegionApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposUsuarioRegion();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaUsuarioRegion(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposUsuarioRegion(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaUsuarioMarcaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposUsuarioMarca();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaUsuarioMarca(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposUsuarioMarca(), 1), $data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function ActualizarUsuarioApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposUsuarioActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaUsuario(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioActualizacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarUsuarioApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaUsuario(),$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarUsuarioRolApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioRolEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaUsuarioRol(),$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioRolEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarUsuarioPlazaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioPlazaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaUsuarioPlaza(),$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioPlazaEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarUsuarioCCApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioCCEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaUsuarioCC(),$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioCCEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarUsuarioRegionApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioRegionEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaUsuarioRegion(),$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioRegionEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarUsuarioMarcaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveUsuarioMarcaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaUsuarioMarca(),$this->_clave,$this->_contentArrayTabla->TipoCamposUsuarioMarcaEliminacion(),$data);
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