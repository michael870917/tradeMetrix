<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorEventosSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposEvento(){
        $this->_arregloCampos=array("id","id_campania","id_cc","fecha","hora_ini","hora_fin","activo");
        return $this->_arregloCampos;
    }
    
    public function TablaEvento(){
        $this->_tabla="evento";
        return $this->_tabla;
    }
    
    public function TipoCamposEvento(){
        $this->_tipoCampos="iiisssi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////    
    
    public function CamposEventoToUsuario(){
        $this->_arregloCampos=array("id","id_evento","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TablaEventoToUsuario(){
        $this->_tabla="evento_to_usuarios";
        return $this->_tabla;
    }
    
    public function TipoCamposEventoToUsuario(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////    
    
    public function CamposEventoToReglasFotoRegistro(){
        $this->_arregloCampos=array("id","id_evento","id_reglas_fotoregistro","cumplida");
        return $this->_arregloCampos;
    }
    
    public function TablaEventoToReglasFotoRegistro(){
        $this->_tabla="evento_to_reglas_fotoregistro";
        return $this->_tabla;
    }
    
    public function TipoCamposEventoToReglasFotoRegistro(){
        $this->_tipoCampos="iiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////    
    
    public function CamposEventoToReglasInventario(){
        $this->_arregloCampos=array("id","id_evento","id_reglas_inventario","cumplida");
        return $this->_arregloCampos;
    }
    
    public function TablaEventoToReglasInventario(){
        $this->_tabla="evento_to_reglas_inventario";
        return $this->_tabla;
    }
    
    public function TipoCamposEventoToReglasInventario(){
        $this->_tipoCampos="iiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////    
    
    public function CamposEventoToReglasOtros(){
        $this->_arregloCampos=array("id","id_evento","id_reglas_otros","cumplida");
        return $this->_arregloCampos;
    }
    
    public function TablaEventoToReglasOtros(){
        $this->_tabla="evento_to_reglas_otros";
        return $this->_tabla;
    }
    
    public function TipoCamposEventoToReglasOtros(){
        $this->_tipoCampos="iiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposEventoActualizacion(){
        $this->_arregloCampos=array("id_campania","id_cc","fecha","hora_ini","hora_fin","activo");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveEventoActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposEventoActualizacion(){
        $this->_tipoCampos="iisssii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposEventoIdCCActualizacion(){
        $this->_arregloCampos=array("id_cc");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveEventoIdCCActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposEventoIdCCActualizacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveEventoEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposEventoEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveEventoToUsuarioEliminacion(){
        $this->_arregloCampos=array("id_evento","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposEventoToUsuarioEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }    
    
}

?>