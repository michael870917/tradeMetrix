<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorUsuarioSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposUsuario(){
        $this->_arregloCampos=array("id","nombre","usuario","clave","email","tel_cel","tel_casa","foto","domicilio");
        return $this->_arregloCampos;
    }
    
    public function TablaUsuario(){
        $this->_tabla="usuarios";
        return $this->_tabla;
    }
    
    public function TipoCamposUsuario(){
        $this->_tipoCampos="issssssss";
        return $this->_tipoCampos;
    }
        
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposUsuarioRol(){
        $this->_arregloCampos=array("id","id_rol","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TablaUsuarioRol(){
        $this->_tabla="usuarios_to_roles";
        return $this->_tabla;
    }
    
    public function TipoCamposUsuarioRol(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposUsuarioPlaza(){
        $this->_arregloCampos=array("id","id_plaza","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TablaUsuarioPlaza(){
        $this->_tabla="plaza_to_usuarios";
        return $this->_tabla;
    }
    
    public function TipoCamposUsuarioPlaza(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposUsuarioCC(){
        $this->_arregloCampos=array("id","id_cc","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TablaUsuarioCC(){
        $this->_tabla="cc_to_usuarios";
        return $this->_tabla;
    }
    
    public function TipoCamposUsuarioCC(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposUsuarioRegion(){
        $this->_arregloCampos=array("id","id_region","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TablaUsuarioRegion(){
        $this->_tabla="region_to_usuarios";
        return $this->_tabla;
    }
    
    public function TipoCamposUsuarioRegion(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposUsuarioMarca(){
        $this->_arregloCampos=array("id","id_marca","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TablaUsuarioMarca(){
        $this->_tabla="marcas_to_usuarios";
        return $this->_tabla;
    }
    
    public function TipoCamposUsuarioMarca(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposUsuarioActualizacion(){
        $this->_arregloCampos=array("nombre","usuario","clave","email","tel_cel","tel_casa","foto","domicilio");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveUsuarioActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioActualizacion(){
        $this->_tipoCampos="ssssssssi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveUsuarioEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveUsuarioRolEliminacion(){
        $this->_arregloCampos=array("id_rol","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioRolEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveUsuarioPlazaEliminacion(){
        $this->_arregloCampos=array("id_plaza","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioPlazaEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveUsuarioCCEliminacion(){
        $this->_arregloCampos=array("id_cc","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioCCEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveUsuarioRegionEliminacion(){
        $this->_arregloCampos=array("id_region","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioRegionEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveUsuarioMarcaEliminacion(){
        $this->_arregloCampos=array("id_marca","id_usuario");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposUsuarioMarcaEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
}

?>