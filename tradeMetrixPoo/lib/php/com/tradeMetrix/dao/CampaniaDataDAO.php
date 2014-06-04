<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorCampaniaSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;    
    
    public function CamposCampania(){
        $this->_arregloCampos=array("id","id_marca","nombre","objetivo_campania","objetivo_kpi","type_kpi","fecha_ini","fecha_fin","activo");
        return $this->_arregloCampos;
    }
    
    public function TablaCampania(){
        $this->_tabla="campanias";
        return $this->_tabla;
    }
    
    public function TipoCamposCampania(){
        $this->_tipoCampos="iissssssi";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaActividad(){
        $this->_arregloCampos=array("id","id_campanias","id_actividades");
        return $this->_arregloCampos;
    }
    
    public function TablaCampaniaActividad(){
        $this->_tabla="campanias_to_actividades";
        return $this->_tabla;
    }
    
    public function TipoCamposCampaniaActividad(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaPlaza(){
        $this->_arregloCampos=array("id","id_plaza","id_campania","simultaniedad","activaciones","outlets");
        return $this->_arregloCampos;
    }
    
    public function TablaCampaniaPlaza(){
        $this->_tabla="plaza_to_campanias";
        return $this->_tabla;
    }
    
    public function TipoCamposCampaniaPlaza(){
        $this->_tipoCampos="iiiiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaReglaFotoRegistro(){
        $this->_arregloCampos=array("id","id_tipo_foto","id_campania","cantidad");
        return $this->_arregloCampos;
    }
    
    public function TablaCampaniaReglaFotoRegistro(){
        $this->_tabla="reglas_fotoregistro";
        return $this->_tabla;
    }
    
    public function TipoCamposCampaniaReglaFotoRegistro(){
        $this->_tipoCampos="iiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaReglaInventario(){
        $this->_arregloCampos=array("id","id_producto","id_campania","unitario","cantidad");
        return $this->_arregloCampos;
    }
    
    public function TablaCampaniaReglaInventario(){
        $this->_tabla="reglas_inventario";
        return $this->_tabla;
    }
    
    public function TipoCamposCampaniaReglaInventario(){
        $this->_tipoCampos="iiiii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaReglaOtros(){
        $this->_arregloCampos=array("id","id_campania","descripcion","cantidad");
        return $this->_arregloCampos;
    }
    
    public function TablaCampaniaReglaOtros(){
        $this->_tabla="reglas_otros";
        return $this->_tabla;
    }
    
    public function TipoCamposCampaniaReglaOtros(){
        $this->_tipoCampos="iiss";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaHerramienta(){
        $this->_arregloCampos=array("id","id_campania","id_herramienta");
        return $this->_arregloCampos;
    }
    
    public function TablaCampaniaHerramienta(){
        $this->_tabla="campanias_to_cat_herramientas";
        return $this->_tabla;
    }
    
    public function TipoCamposCampaniaHerramienta(){
        $this->_tipoCampos="iii";
        return $this->_tipoCampos;
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaActualizacion(){
        $this->_arregloCampos=array("id_marca","nombre","objetivo_campania","objetivo_kpi","type_kpi","fecha_ini","fecha_fin","activo");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveCampaniaActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaActualizacion(){
        $this->_tipoCampos="issssssii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposCampaniaMarcaActualizacion(){
        $this->_arregloCampos=array("id_marca");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveCampaniaMarcaActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaMarcaActualizacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCampaniaEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCampaniaActividadEliminacion(){
        $this->_arregloCampos=array("id_campanias","id_actividades");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaActividadEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCampaniaPlazaEliminacion(){
        $this->_arregloCampos=array("id_plaza","id_campania");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaPlazaEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCampaniaReglaFotoRegistroEliminacion(){
        $this->_arregloCampos=array("id_tipo_foto","id_campania");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaReglaFotoRegistroEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCampaniaReglaInventarioEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaReglaInventarioEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCampaniaReglaOtrosEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaReglaOtrosEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CamposLLaveCampaniaHerramientaEliminacion(){
        $this->_arregloCampos=array("id_campania","id_herramienta");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCampaniaHerramientaEliminacion(){
        $this->_tipoCampos="ii";
        return $this->_tipoCampos;
    }
}

?>