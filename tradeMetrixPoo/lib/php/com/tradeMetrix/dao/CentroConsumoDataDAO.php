<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorCCSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposCatCC(){
        $this->_arregloCampos=array("id","id_plaza","nombre_cc","geo_lng","geo_lat","direccion","aforo");
        return $this->_arregloCampos;
    }

    public function TablaCatCC(){
        $this->_tabla="cat_cc";
        return $this->_tabla;
    }
    
    public function TipoCamposCatCC(){
        $this->_tipoCampos="iissssi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCatCCActualizacion(){
        $this->_arregloCampos=array("id_plaza","nombre_cc","geo_lng","geo_lat","direccion","aforo");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveCatCCActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCatCCActualizacion(){
        $this->_tipoCampos="issssii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCatCCEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCatCCEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }    
    
}

?>