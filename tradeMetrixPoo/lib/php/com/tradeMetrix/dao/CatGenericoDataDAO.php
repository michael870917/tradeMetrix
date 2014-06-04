<?php

/**
 * @author michael
 * @copyright 2014
 */

class ManejadorCatalogoGenericoSQL{
    
    private $_arregloCampos;
    private $_tabla;
    private $_tipoCampos;
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    // Campo llave actualizacion
    public function CamposLLaveCatalogoActualizacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function CamposLLaveCatalogoEliminacion(){
        $this->_arregloCampos=array("id");
        return $this->_arregloCampos;
    }
    
    public function TipoCamposCatGenericoEliminacion(){
        $this->_tipoCampos="i";
        return $this->_tipoCampos;
    }
    
    public function TipoCamposCatGenerico(){
        $this->_tipoCampos="is";
        return $this->_tipoCampos;
    }
    
    public function TipoCamposCatGenericoActualizacion(){
        $this->_tipoCampos="si";
        return $this->_tipoCampos;
    }    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    // Tablas
    public function TablaCatHerramientas(){
        $this->_tabla="cat_herramientas";
        return $this->_tabla;
    }
    
    
    public function TablaCatOrigen(){
        $this->_tabla="cat_origen";
        return $this->_tabla;
    }
    
    public function TablaCatPersonalActividad(){
        $this->_tabla="cat_personal_actividad";
        return $this->_tabla;
    }
    
    public function TablaCatRegion(){
        $this->_tabla="cat_region";
        return $this->_tabla;
    }
    
    public function TablaCatRoles(){
        $this->_tabla="cat_roles";
        return $this->_tabla;
    }
    
    public function TablaCatTipoAccion(){
        $this->_tabla="cat_tipo_accion";
        return $this->_tabla;
    }
    
    public function TablaCatTipoActividad(){
        $this->_tabla="cat_tipo_actividad";
        return $this->_tabla;
    }
    
    public function TablaCatTipoFoto(){
        $this->_tabla="cat_tipo_foto";
        return $this->_tabla;
    }
    
    public function TablaCatTipoMedia(){
        $this->_tabla="cat_tipo_media";
        return $this->_tabla;
    }
    
    public function TablaCatTipoPregunta(){
        $this->_tabla="cat_tipo_pregunta";
        return $this->_tabla;
    }
    
    public function TablaCatTipoProductos(){
        $this->_tabla="cat_tipo_productos";
        return $this->_tabla;
    }
    
    public function TablaCatTipoRespuesta(){
        $this->_tabla="cat_tipo_respuesta";
        return $this->_tabla;
    }
    
    public function TablaCatVisualizaciones(){
        $this->_tabla="cat_visualizaciones";
        return $this->_tabla;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    // Insertar datos catalogos
    public function CamposCatHerramientasInsercion(){
        $this->_arregloCampos=array("id","herramienta");
        return $this->_arregloCampos;
    }
    
    public function CamposCatOrigenInsercion(){
        $this->_arregloCampos=array("id","origen");
        return $this->_arregloCampos;
    }
    
    public function CamposCatPersonalActividadInsercion(){
        $this->_arregloCampos=array("id","personal_actividad");
        return $this->_arregloCampos;
    }
    
    public function CamposCatRegionInsercion(){
        $this->_arregloCampos=array("id","region");
        return $this->_arregloCampos;
    }
    
    public function CamposCatRolesInsercion(){
        $this->_arregloCampos=array("id","rol");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoAccionInsercion(){
        $this->_arregloCampos=array("id","accion");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoActividadInsercion(){
        $this->_arregloCampos=array("id","actividad");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoFotoInsercion(){
        $this->_arregloCampos=array("id","tipo_foto");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoMediaInsercion(){
        $this->_arregloCampos=array("id","tipo_media");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoPreguntaInsercion(){
        $this->_arregloCampos=array("id","tipo_pregunta");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoProductoInsercion(){
        $this->_arregloCampos=array("id","tipo_producto");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoRespuestaInsercion(){
        $this->_arregloCampos=array("id","tipo_respuesta");
        return $this->_arregloCampos;
    }
    
    public function CamposCatVisualizacionesInsercion(){
        $this->_arregloCampos=array("id","visualizacion");
        return $this->_arregloCampos;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    // Actualiza datos catalogos
    public function CamposCatHerramientasActualizacion(){
        $this->_arregloCampos=array("herramienta");
        return $this->_arregloCampos;
    }        
    
    public function CamposCatOrigenActualizacion(){
        $this->_arregloCampos=array("origen");
        return $this->_arregloCampos;
    }
    
    public function CamposCatPersonalActividadActualizacion(){
        $this->_arregloCampos=array("personal_actividad");
        return $this->_arregloCampos;
    }
    
    public function CamposCatRegionActualizacion(){
        $this->_arregloCampos=array("region");
        return $this->_arregloCampos;
    }
    
    public function CamposCatRolesActualizacion(){
        $this->_arregloCampos=array("rol");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoAccionActualizacion(){
        $this->_arregloCampos=array("accion");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoActividadActualizacion(){
        $this->_arregloCampos=array("actividad");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoFotoActualizacion(){
        $this->_arregloCampos=array("tipo_foto");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoMediaActualizacion(){
        $this->_arregloCampos=array("tipo_media");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoPreguntaActualizacion(){
        $this->_arregloCampos=array("tipo_pregunta");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoProductoActualizacion(){
        $this->_arregloCampos=array("tipo_producto");
        return $this->_arregloCampos;
    }
    
    public function CamposCatTipoRespuestaActualizacion(){
        $this->_arregloCampos=array("tipo_respuesta");
        return $this->_arregloCampos;
    }
    
    public function CamposCatVisualizacionActualizacion(){
        $this->_arregloCampos=array("visualizacion");
        return $this->_arregloCampos;
    }
}

?>