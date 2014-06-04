<?php
/**
 * @author michael
 * @copyright 2014
 */
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/ManagerInterface.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/accionesValidacion.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/dao/ProductosDAO.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Producto.php';
include_once $CFG->dataroot.'/lib/php/com/tradeMetrix/bo/Consumo.php';
include_once $CFG->dataroot.'/lib/php/application/Utilities.php';

class ProductoManager implements ManagerInterface{
    
    private $_objetoAccionesValidacion;
    private $_objetoUsuarioBO;
    private $_objetoUsuarioDAO;
    private $_propiedades = array();
    private $_value;
    private $_id;
    private $_dataEntry;
    private $_retorno;                
    private $_utilities;
    
    public function __construct(){
        $this->_objetoAccionesValidacion = new AccionesValidacion();
        $this->_objetoProductoDAO = new ProductosDAO();
        $this->_objetoProductoBO = new Producto();
        $this->_utilities = new Utilities();
    }
    
    public function __destruct(){
        unset($this->_objetoAccionesValidacion);
        unset($this->_objetoProductoDAO);
        unset($this->_objetoProductoBO);
        unset($this->_utilities);
    }
    
    public function ArmarCondicional($nombreCampo,$condicional,$valorEvaluacion){
        $this->_propiedades[$nombreCampo]=array($condicional => $valorEvaluacion);
    }
            
    public function BuscaProducto($tipoSalida=null){
        if(($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) == 0) || ($tipoSalida == "" && count($this->_propiedades) > 0)){
            $controlObjeto=false;
        }else{
            if(($tipoSalida == "" && count($this->_propiedades) == 0) || ($tipoSalida == Constantes::OUTPUTSLISTA && count($this->_propiedades) == 0)){
                $Rs=$this->_objetoProductoDAO->BusquedaProductosApp();
            }elseif($tipoSalida != "" && count($this->_propiedades) > 0){
                $condicional=$this->_objetoAccionesValidacion->Where($this->_propiedades);
                $Rs=$this->_objetoProductoDAO->BusquedaProductosApp($condicional);
            }
            
            if($tipoSalida == Constantes::OUTPUTSLISTA || $tipoSalida == ""){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoLista($Rs) : false);    
            }elseif($tipoSalida == Constantes::OUTPUTSIMPLE && count($this->_propiedades) > 0){
                $controlObjeto = ($Rs !== false ? $this->FormaObjetoSimple($Rs) : false);    
            }    
        }
        return $controlObjeto;
    }
        
    public function FormaObjetoSimple($array){
        $objProduct= $this->_objetoProductoBO;
        foreach($array AS $key => $value){
            $objProduct->setIdProducto($value->idProducto);
            $objProduct->setIdMarcaProducto($value->idMarcaProducto);
            $objProduct->setMarcaProducto($value->marcaProducto);
            $objProduct->setIdTipoProducto($value->idTipoProducto);
            $objProduct->setTipoProducto($value->tipoProducto);
            $objProduct->setNombreProducto($value->nombreProducto);
            $objProduct->setDescripcionProducto($value->descripcionProducto);
            $objProduct->setSkuProducto($value->skuProducto);
            $objProduct->setThumbProducto($value->thumbProducto);
            $objProduct->setPresentacionProducto($value->presentacionProducto);
            $objProduct->setExistenciaProducto($value->sku1nProducto);
            $objProduct->setSku1nProducto($value->existenciaProducto);
            $objProduct->setIdUsuarioProducto($value->idUsuarioProducto);
            $objProduct->setIdOrigenProducto($value->idOrigenProducto);
            $objProduct->setOrigenProducto($value->origenProducto);
        }
        return $objProduct;
    }
        
    public function  FormaObjetoLista($array){
        $read = new Lectura();
        foreach($array as $key => $value){            
            $objMayor = new Producto();            
            $objMayor->setIdProducto($value->idProducto);
            $objMayor->setIdMarcaProducto($value->idMarcaProducto);
            $objMayor->setMarcaProducto($value->marcaProducto);
            $objMayor->setIdTipoProducto($value->idTipoProducto);
            $objMayor->setTipoProducto($value->tipoProducto);
            $objMayor->setNombreProducto($value->nombreProducto);
            $objMayor->setDescripcionProducto($value->descripcionProducto);
            $objMayor->setSkuProducto($value->skuProducto);
            $objMayor->setThumbProducto($value->thumbProducto);
            $objMayor->setPresentacionProducto($value->presentacionProducto);
            $objMayor->setExistenciaProducto($value->sku1nProducto);
            $objMayor->setSku1nProducto($value->existenciaProducto);
            $objMayor->setIdUsuarioProducto($value->idUsuarioProducto);
            $objMayor->setIdOrigenProducto($value->idOrigenProducto);
            $objMayor->setOrigenProducto($value->origenProducto);
            $read->setNuevoObjeto($objMayor);
            $read->cargarObjetos();             
        }        
        $coleccion=$read->getListaObjetos();
        return $coleccion;
    }
    
    public function InsertaProducto($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdMarcaProducto(),$obj->getIdTipoProducto(),$obj->getNombreProducto(),$obj->getDescripcionProducto()
                ,$obj->getSkuProducto(),$obj->getThumbProducto(),$obj->getPresentacionProducto());
                $lastId=$this->_objetoProductoDAO->InsertaProductosApp($this->_dataEntry);
                $this->_retorno=($lastId > 0 ? $lastId : false);
            }else{
                $this->_retorno=false;
            }    
        }else{
            $this->_retorno=false;
        }
        return $this->_retorno;
    }
    
    public function ActualizaProducto($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdMarcaProducto(),$obj->getIdTipoProducto(),$obj->getNombreProducto(),$obj->getDescripcionProducto()
                ,$obj->getSkuProducto(),$obj->getThumbProducto(),$obj->getPresentacionProducto(),$obj->getIdProducto());
                $this->_value = $this->_objetoProductoDAO->ActualizarProductoApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
    
    public function EliminarProducto($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getIdProducto());
                $this->_value = $this->_objetoProductoDAO->EliminarProductoApp($this->_dataEntry);
            }else{
                $this->_id = false;
            }
        }else{
            $this->_id = false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
        
    public function ActualizaExistencia($obj){
        if($obj != "" || $obj != NULL){
            if(is_object($obj)){
                $this->_dataEntry=array($obj->getExistenciaProducto(),$obj->getIdUsuarioProducto(),$obj->getIdProducto());
                $this->_value = $this->_objetoProductoDAO->ActualizarExistenciaApp($this->_dataEntry);
            }else{
                $this->_id=false;
            }
        }else{
            $this->_id=false;
        }
        $this->_id = ($this->_value > 0 ? $this->_value : false);
        return $this->_id;
    }
}

class Lectura{
    private $_arregloObjetos = array();    
    public function cargarObjetos(){
        array_push($this->_arregloObjetos,$this->nuevoArreglo);
    }
    
    public function getListaObjetos(){
        return $this->_arregloObjetos;
    }
    
    public function setNuevoObjeto(Producto $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }
}
?>