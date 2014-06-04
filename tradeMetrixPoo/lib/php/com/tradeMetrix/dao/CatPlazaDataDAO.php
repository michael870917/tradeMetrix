<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorPlazaSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposCatPlaza(){
        $this->_arregloCampos=array("id","id_region","distrito");
        return $this->_arregloCampos;
    }

    public function TablaCatPlaza(){
        $this->_tabla="cat_plaza";
        return $this->_tabla;
    }
    
    public function TipoCamposCatPlaza(){
        $this->_tipoCampos="iis";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCatPlazaActualizacion(){
        $this->_arregloCampos=array("id_region","distrito");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveCatPlazaActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCatPlazaActualizacion(){
        $this->_tipoCampos="isi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCatPlazaEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCatPlazaEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }    
    
}

?>