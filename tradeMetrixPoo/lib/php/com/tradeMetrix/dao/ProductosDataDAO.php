<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorProductoSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposProducto(){
        $this->_arregloCampos=array("id","id_marca","id_tipo_producto","nombre","descripcion","sku","thumb","presentacion");
        return $this->_arregloCampos;
    }
    
    public function TablaProducto(){
        $this->_tabla="productos";
        return $this->_tabla;
    }
    
    public function TipoCamposProducto(){
        $this->_tipoCampos="iiisssss";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposProductoActualizacion(){
        $this->_arregloCampos=array("id_marca","id_tipo_producto","nombre","descripcion","sku","thumb","presentacion");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveProductoActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposProductoActualizacion(){
        $this->_tipoCampos="iisssssi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function TablaUsuariosToProducto(){
        $this->_tabla="usuarios_to_productos";
        return $this->_tabla;
    }
    
    public function CamposProductoExistenciaActualizacion(){
        $this->_arregloCampos=array("consumo");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveProductoExistenciaActualizacion(){
        $this->_arregloCampos=array("id_usuario","id_producto");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposProductoExistenciaActualizacion(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveProductoEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposProductoEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }    
    
}

?>