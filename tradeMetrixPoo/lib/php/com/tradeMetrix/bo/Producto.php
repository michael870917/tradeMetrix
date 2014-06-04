<?php
/**
 * @author michael
 * @copyright 2014
 */
class Producto{
    private $_idProducto;
    private $_idMarcaProducto;    
    private $_marcaProducto;
    private $_idTipoProducto;
    private $_tipoProducto;
    private $_nombreProducto;
    private $_descripcionProducto; 
    private $_skuProducto;
    private $_thumbProducto;
    private $_presentacionProducto;
    private $_existenciaProducto;
    private $_sku1nProducto;
    private $_idUsuarioProducto;
    private $_idOrigenProducto;
    private $_origenProducto;
    
    public function setIdProducto($clave=null){
        $this->_idProducto = $clave;
    }
    
    public function getIdProducto(){
        return $this->_idProducto;
    }
    
    
    public function setIdMarcaProducto($clave=null){
        $this->_idMarcaProducto = $clave;
    }
    
    public function getIdMarcaProducto(){
        return $this->_idMarcaProducto;
    }
    
    public function setMarcaProducto($clave=null){
        $this->_marcaProducto = $clave;
    }
    
    public function getMarcaProducto(){
        return $this->_marcaProducto;
    }
    
    public function setIdTipoProducto($clave=null){
        $this->_idTipoProducto = $clave;
    }
    
    public function getIdTipoProducto(){
        return $this->_idTipoProducto;
    }
    
    public function setTipoProducto($clave=null){
        $this->_tipoProducto = $clave;
    }
    
    public function getTipoProducto(){
        return $this->_tipoProducto;
    }
    
    public function setNombreProducto($clave=null){
        $this->_nombreProducto = $clave;
    }
    
    public function getNombreProducto(){
        return $this->_nombreProducto;
    }
    
    public function setDescripcionProducto($clave=null){
        $this->_descripcionProducto = $clave;
    }
    
    public function getDescripcionProducto(){
        return $this->_descripcionProducto;
    }
    
    public function setSkuProducto($clave=null){
        $this->_skuProducto = $clave;
    }
    
    public function getSkuProducto(){
        return $this->_skuProducto;
    }
    
    public function setThumbProducto($clave=null){
        $this->_thumbProducto = $clave;
    }
    
    public function getThumbProducto(){
        return $this->_thumbProducto;
    }
        
    public function setPresentacionProducto($clave=null){
        $this->_presentacionProducto = $clave;
    }
    
    public function getPresentacionProducto(){
        return $this->_presentacionProducto;
    }
    
    public function setExistenciaProducto($clave=null){
        $this->_existenciaProducto = $clave;
    }
    
    public function getExistenciaProducto(){
        return $this->_existenciaProducto;
    }
    
    public function setSku1nProducto($clave=null){
        $this->_sku1nProducto = $clave;
    }
    
    public function getSku1nProducto(){
        return $this->_sku1nProducto;
    }
    
    public function setIdUsuarioProducto($clave=null){
        $this->_idUsuarioProducto = $clave;
    }
    
    public function getIdUsuarioProducto(){
        return $this->_idUsuarioProducto;
    }
    
    public function setIdOrigenProducto($clave=null){
        $this->_idOrigenProducto = $clave;
    }
    
    public function getIdOrigenProducto(){
        return $this->_idOrigenProducto;
    }
    
    public function setOrigenProducto($clave=null){
        $this->_origenProducto = $clave;
    }
    
    public function getOrigenProducto(){
        return $this->_origenProducto;
    }        
}
?>