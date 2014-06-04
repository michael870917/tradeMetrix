<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorOpcionSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposOpcion(){
        $this->_arregloCampos=array("id","id_pregunta","id_opcion","observacion","requerido");
        return $this->_arregloCampos;
    }
    
    public function TablaOpcion(){
        $this->_tabla="Opciones";
        return $this->_tabla;
    }
    
    public function TipoCamposOpcion(){
        $this->_tipoCampos="iiisi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposOpcionActualizacion(){
        $this->_arregloCampos=array("id_pregunta","id_opcion","observacion","requerido");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveOpcionActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposOpcionActualizacion(){
        $this->_tipoCampos="iisii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveOpcionEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposOpcionEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
}

?>