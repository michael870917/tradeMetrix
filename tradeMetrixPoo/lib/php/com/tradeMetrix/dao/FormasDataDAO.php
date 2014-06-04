<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorFormaSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposForma(){
        $this->_arregloCampos=array("id","id_clasif","nombre_forma","estatus");
        return $this->_arregloCampos;
    }
    
    public function TablaForma(){
        $this->_tabla="formas";
        return $this->_tabla;
    }
    
    public function TipoCamposForma(){
        $this->_tipoCampos="iisi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposFormaActualizacion(){
        $this->_arregloCampos=array("id_clasif","nombre_forma","estatus");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveFormaActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposFormaActualizacion(){
        $this->_tipoCampos="isii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveFormaEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposFormaEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
}

?>