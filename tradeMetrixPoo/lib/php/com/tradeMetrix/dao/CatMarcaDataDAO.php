<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorMarcaSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposCatMarca(){
        $this->_arregloCampos=array("id","marca","acronimo","categoria");
        return $this->_arregloCampos;
    }

    public function TablaCatMarca(){
        $this->_tabla="cat_marcas";
        return $this->_tabla;
    }
    
    public function TipoCamposCatMarca(){
        $this->_tipoCampos="isss";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCatMarcaActualizacion(){
        $this->_arregloCampos=array("marca","acronimo","categoria");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveCatMarcaActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCatMarcaActualizacion(){
        $this->_tipoCampos="sssi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCatMarcaEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCatMarcaEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }    
    
}

?>