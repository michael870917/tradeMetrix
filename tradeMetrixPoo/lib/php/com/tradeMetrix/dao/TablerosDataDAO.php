<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorTableroSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposTablero(){
        $this->_arregloCampos=array("id","id_rol","id_reporte","id_visualización");
        return $this->_arregloCampos;
    }
    
    public function TablaTablero(){
        $this->_tabla="tableros";
        return $this->_tabla;
    }
    
    public function TipoCamposTablero(){
        $this->_tipoCampos="iiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposTableroActualizacion(){
        $this->_arregloCampos=array("id_rol","id_reporte","id_visualización");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveTableroActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposTableroActualizacion(){
        $this->_tipoCampos="iiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveTableroEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposTableroEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }    
    
}

?>