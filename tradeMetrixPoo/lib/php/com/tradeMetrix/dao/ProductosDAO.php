<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("ProductosDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class ProductosDAO extends DaoAbstract implements InterfaceFuncionesProductos{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorProductoSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function BusquedaProductosApp($filtro=null){
        $this->_query = "SELECT
                *
                FROM
                (
                SELECT 
                productos.id as idProducto,cat_marcas.id as idMarcaProducto,cat_marcas.marca as marcaProducto,id_tipo_producto as idTipoProducto
                ,cat_tipo_productos.tipo_producto as tipoProducto,productos.nombre as nombreProducto
                ,descripcion as descripcionProducto,productos.sku as skuProducto,thumb as thumbProducto,presentacion as presentacionProducto
                ,usuarios_to_productos.sku_1n as sku1nProducto,usuarios_to_productos.consumo as existenciaProducto
                ,u.id as idUsuarioProducto,cat_origen.id as idOrigenProducto,cat_origen.origen as origenProducto
                
                FROM productos
                INNER JOIN cat_marcas ON cat_marcas.id=productos.id_marca
                INNER JOIN cat_tipo_productos ON cat_tipo_productos.id=productos.id_tipo_producto
                INNER JOIN usuarios_to_productos ON usuarios_to_productos.id_producto=productos.id
                INNER JOIN usuarios u ON u.id=usuarios_to_productos.id_usuario
                INNER JOIN cat_origen ON cat_origen.id=usuarios_to_productos.id_origen".
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
    
        
    public function InsertaProductosApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposProducto();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaProducto(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposProducto(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
        
    public function ActualizarProductoApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposProductoActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveProductoActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaProducto(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposProductoActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function ActualizarExistenciaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposProductoExistenciaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLaveProductoExistenciaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaUsuariosToProducto(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposProductoExistenciaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    
    
    public function EliminarProductoApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLaveProductoEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaProducto(),$this->_clave,$this->_contentArrayTabla->TipoCamposProductoEliminacion(),$data);
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