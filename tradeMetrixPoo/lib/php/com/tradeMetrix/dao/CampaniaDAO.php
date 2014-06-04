<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("CampaniaDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class CampaniaDAO extends DaoAbstract implements InterfaceFuncionesCampania{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorCampaniaSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaCampaniaApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT campanias.id as idCampania,campanias.id_marca as idMarcaCampania,campanias.nombre AS nombreCampania
                ,objetivo_campania as objetivoCampania,objetivo_kpi as objetivoKpiCampania,type_kpi as typeKpiCampania
                ,campanias.fecha_ini as fechaIniCampania,campanias.fecha_fin as fechaFinCampania,activo as activoCampania
                ,cat_marcas.marca as marcaCampania
                FROM campanias
                INNER JOIN cat_marcas ON cat_marcas.id=campanias.id_marca
                )AS a
                LEFT JOIN
                (
                select
                id_plaza as idPlazaCampania,distrito as plazaCampania,plaza_to_campanias.id_campania as idCampaniaPlaza 
                from plaza_to_campanias
                INNER JOIN cat_plaza ON cat_plaza.id=plaza_to_campanias.id_plaza
                ) AS b ON b.idCampaniaPlaza=a.idCampania
                LEFT JOIN
                (
                select 
                campanias_to_actividades.id_campanias as idCampaniaActividad,campanias_to_actividades.id_actividades as idActividadCampania
                ,actividades.id_tipo_actividad as idTipoActividadCampania
                from actividades
                INNER JOIN cat_tipo_actividad ON cat_tipo_actividad.id=actividades.id_tipo_actividad
                INNER JOIN campanias_to_actividades ON campanias_to_actividades.id_actividades=actividades.id
                )AS c ON c.idCampaniaActividad=a.idCampania
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
    
    public function BusquedaActividadCampaniaApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    campanias_to_actividades
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
    
    public function BusquedaPlazaCampaniaApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    plaza_to_campanias
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
    
    public function BusquedaReglaFotoRegistroCampaniaApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    reglas_fotoregistro
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
    
    public function BusquedaReglaInventarioCampaniaApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    reglas_inventario
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
    
    public function BusquedaReglaOtrosCampaniaApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    reglas_otros
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
    
    public function BusquedaHerramientasCampaniaApp($filtro=null){
        $this->_query = "SELECT * 
                    FROM
                    campanias_to_cat_herramientas
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
    
    
    public function BusquedaHerramientasToCampaniaApp($filtro=null){
        $this->_query = "SELECT 
                    *
                    FROM
                    (
                    SELECT
                    id as idCampania
                    FROM campanias
                    )as a
                    LEFT JOIN
                    (
                    SELECT
                     cat_herramientas.id as idHerramienta,cat_herramientas.herramienta as herramientaCampania,campanias_to_cat_herramientas.id_campania as idCampaniaHerramientaL 
                    FROM cat_herramientas
                    INNER JOIN campanias_to_cat_herramientas ON campanias_to_cat_herramientas.id_herramienta=cat_herramientas.id
                    )AS b ON a.idCampania=b.idCampaniaHerramientaL
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
    
    
    public function BusquedaReglaFotoRegistroToCampaniaApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT
                id as idCampania 
                FROM campanias
                )as a
                LEFT JOIN
                (
                SELECT
                reglas_fotoregistro.id as idReglaFotoRegistro,id_tipo_foto as idTipoFoto,tipo_foto as tipoFoto,id_campania as idCampaniaReglaFotoRegistro
                ,cantidad as cantidadFotoRegistro
                FROM reglas_fotoregistro
                INNER JOIN cat_tipo_foto ON cat_tipo_foto.id=reglas_fotoregistro.id_tipo_foto
                )AS b ON a.idCampania=b.idCampaniaReglaFotoRegistro
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
    
    public function BusquedaReglaInventarioToCampaniaApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT
                id as idCampania 
                FROM campanias
                )as a
                LEFT JOIN
                (
                SELECT
                reglas_inventario.id as idReglaInventario,id_producto as idProductoReglaInventario,unitario as unitarioReglaInventario
                ,cantidad as cantidadReglaInventario,id_campania as idCampaniaReglaInventario,productos.nombre as productoReglaInventario
                FROM
                reglas_inventario
                INNER JOIN productos ON productos.id=reglas_inventario.id_producto
                )AS b ON a.idCampania=b.idCampaniaReglaInventario
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
    
    public function BusquedaReglaOtrosToCampaniaApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT
                id as idCampania 
                FROM campanias
                )as a
                LEFT JOIN
                (
                SELECT
                id as idReglaOtros,descripcion as descripcionReglaOtros,cantidad as cantidadReglaOtros,id_campania as idCampaniaReglaOtros
                FROM
                reglas_otros
                )AS b ON a.idCampania=b.idCampaniaReglaOtros
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
       
    public function InsertaCampaniaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCampania();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCampania(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCampania(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaActividadCampaniaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCampaniaActividad();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCampaniaActividad(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCampaniaActividad(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaPlazaCampaniaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCampaniaPlaza();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCampaniaPlaza(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCampaniaPlaza(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }

    public function InsertaReglaFotoRegistroCampaniaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCampaniaReglaFotoRegistro();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCampaniaReglaFotoRegistro(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCampaniaReglaFotoRegistro(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaReglaInventarioCampaniaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCampaniaReglaInventario();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCampaniaReglaInventario(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCampaniaReglaInventario(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaReglaOtrosCampaniaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCampaniaReglaOtros();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCampaniaReglaOtros(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCampaniaReglaOtros(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
    
    public function InsertaHerramientaCampaniaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposCampaniaHerramienta();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaCampaniaHerramienta(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposCampaniaHerramienta(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarCampaniaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposCampaniaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaCampania(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function ActualizarMarcaCampaniaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposCampaniaMarcaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaMarcaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaCampania(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaMarcaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarCampaniaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCampania(),$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarActividadCampaniaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaActividadEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCampaniaActividad(),$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaActividadEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarPlazaCampaniaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaPlazaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCampaniaPlaza(),$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaPlazaEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarReglaFotoRegistroCampaniaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaReglaFotoRegistroEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCampaniaReglaFotoRegistro(),$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaReglaFotoRegistroEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarReglaInventarioCampaniaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaReglaInventarioEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCampaniaReglaInventario(),$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaReglaInventarioEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarReglaOtrosCampaniaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaReglaOtrosEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCampaniaReglaOtros(),$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaReglaOtrosEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarHerramientaCampaniaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveCampaniaHerramientaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaCampaniaHerramienta(),$this->_clave,$this->_contentArrayTabla->TipoCamposCampaniaHerramientaEliminacion(),$data);
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