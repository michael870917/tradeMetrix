<?php

/**
 * @author michael
 * @copyright 2014
 */
class ReglaInventario{
    private $_idReglaInventario;
    private $_idProductoInventario;
    private $_productoInventario;
    private $_idCampaniaInventario;
    private $_unitarioInventario;
    private $_cantidadInventario;
    
    public function setIdReglaInventario($clave=null){
        $this->_idReglaInventario = $clave;
    }
    
    public function getIdReglaInventario(){
        return $this->_idReglaInventario;
    }
    
    public function setIdProductoInventario($clave=null){
        $this->_idProductoInventario = $clave;
    }
    
    public function getIdProductoInventario(){
        return $this->_idProductoInventario;
    }
    
    public function setProductoInventario($clave=null){
        $this->_productoInventario = $clave;
    }
    
    public function getProductoInventario(){
        return $this->_productoInventario;
    }
    
    public function setIdCampaniaInventario($clave=null){
        $this->_idCampaniaInventario = $clave;
    }
    
    public function getIdCampaniaInventario(){
        return $this->_idCampaniaInventario;
    }
    
    public function setUnitarioInventario($clave=null){
        $this->_unitarioInventario = $clave;
    }
    
    public function getUnitarioInventario(){
        return $this->_unitarioInventario;
    }
    
    public function setCantidadInventario($clave=null){
        $this->_cantidadInventario = $clave;
    }
    
    public function getCantidadInventario(){
        return $this->_cantidadInventario;
    }
    
    public function  FormaObjetoListaReglaInventarioCampania($array){        
        $read = new LecturaReglaInventario();
        foreach($array as $key => $value){
            $objMayor = new ReglaInventario();
            $objMayor->setIdReglaInventario($value->idReglaInventario);
            $objMayor->setIdProductoInventario($value->idProductoReglaInventario);
            $objMayor->setProductoInventario($value->productoReglaInventario);
            $objMayor->setIdCampaniaInventario($value->idCampaniaReglaInventario);
            $objMayor->setUnitarioInventario($value->unitarioReglaInventario);
            $objMayor->setCantidadInventario($value->cantidadReglaInventario);
            $read->setNuevoObjetoReglaInventario($objMayor);
            $read->cargarObjetosReglaInventario();
        }        
        $coleccion=$read->getListaObjetosReglaInventario();
        return $coleccion;
    }
    
}

class LecturaReglaInventario{
    private $_arregloObjetosReglaInventario = array();    
    
    ///////////////////////////////////////////////
    // Opera Bloque Regla inventario    
    public function cargarObjetosReglaInventario(){
        array_push($this->_arregloObjetosReglaInventario,$this->nuevoArreglo);
    }
    
    public function getListaObjetosReglaInventario(){
        return $this->_arregloObjetosReglaInventario;
    }
    
    public function setNuevoObjetoReglaInventario(ReglaInventario $objetoIncorporar){
        $this->nuevoArreglo=$objetoIncorporar;
    }        
}

?>