<?php

/**
 * @author michael
 * @copyright 2014
 */

interface InterfaceFuncionesUsuarios{
    public function BusquedaUsuariosApp();    
    public function InsertaUsuariosApp($data);
    public function InsertaUsuarioRolApp($data);
    public function InsertaUsuarioPlazaApp($data);
    public function InsertaUsuarioCCApp($data);
    public function InsertaUsuarioRegionApp($data);
    public function InsertaUsuarioMarcaApp($data);
    public function ActualizarUsuarioApp($data);
    public function EliminarUsuarioApp($data);
    public function EliminarUsuarioRolApp($data);
    public function EliminarUsuarioPlazaApp($data);
    public function EliminarUsuarioCCApp($data);
    public function EliminarUsuarioRegionApp($data);
    public function EliminarUsuarioMarcaApp($data);
    public function LoginUsuarioApp($username,$password);        
}

interface InterfaceFuncionesProductos{
    public function BusquedaProductosApp();
    public function InsertaProductosApp($data);
    public function ActualizarProductoApp($data);
    public function ActualizarExistenciaApp($data);
    public function EliminarProductoApp($data);    
}

interface InterfaceFuncionesTableros{
    public function BusquedaTablerosApp();
    public function InsertaTableroApp($data);
    public function ActualizarTableroApp($data);
    public function EliminarTableroApp($data);
}

interface InterfaceFuncionesCatalogoGenerico{
    public function BusquedaCatalogoApp();
    public function InsertaCatalogoApp($data);
    public function ActualizarCatalogoApp($data);
    public function EliminarCatalogoApp($data);
}

interface InterfaceFuncionesCatCC{
    public function BusquedaCatCCApp();
    public function InsertaCatCCApp($data);
    public function ActualizarCatCCApp($data);
    public function EliminarCatCCApp($data);
}

interface InterfaceFuncionesCatMarca{
    public function BusquedaCatMarcaApp();
    public function InsertaCatMarcaApp($data);
    public function ActualizarCatMarcaApp($data);
    public function EliminarCatMarcaApp($data);
}

interface InterfaceFuncionesCatPlaza{
    public function BusquedaCatPlazaApp();
    public function InsertaCatPlazaApp($data);
    public function ActualizarCatPlazaApp($data);
    public function EliminarCatPlazaApp($data);
}

interface InterfaceFuncionesAuditorias{
    public function BusquedaAuditoriaApp();
    public function BusquedaUsuarioAuditoriaApp();
    public function InsertaAuditoriaApp($data);
    public function InsertaUsuarioAuditoriaApp($data);
    public function ActualizarAuditoriaApp($data);
    public function EliminarAuditoriaApp($data);
    public function EliminarUsuarioAuditoriaApp($data);
}

interface InterfaceFuncionesEventos{
    public function BusquedaEventoApp();
    public function BusquedaEventoToUsuarioApp();
    public function InsertaEventoApp($data);
    public function InsertaEventoToUsuarioApp($data);
    public function InsertaEventoToReglasFotoRegistroApp($data);
    public function InsertaEventoToReglasInventarioApp($data);
    public function InsertaEventoToReglasOtrosApp($data);
    public function ActualizarEventoApp($data);
    public function ActualizarEventoIdCCApp($data);
    public function EliminarEventoApp($data);
    public function EliminarEventoToUsuarioApp($data);
        
}

interface InterfaceFuncionesRespuesta{
    public function InsertaRespuestasApp($data);
    public function ActualizarRespuestasApp($data);
    public function EliminarRespuestasApp($data);
}

interface InterfaceFuncionesOpcion{
    public function InsertaOpcionesApp($data);
    public function ActualizarOpcionesApp($data);
    public function EliminarOpcionesApp($data);
}

interface InterfaceFuncionesPreguntas{
    public function InsertaPreguntaApp($data);
    public function ActualizarPreguntaApp($data);
    public function EliminarPreguntaApp($data);
}

interface InterfaceFuncionesFormas{
    public function BusquedaFormaApp();
    public function InsertaFormaApp($data);
    public function ActualizarFormaApp($data);
    public function EliminarFormaApp($data);
}

interface InterfaceFuncionesActividad{
    public function BusquedaActividadApp();
    public function InsertaActividadApp($data);
    public function ActualizarActividadApp($data);
    public function EliminarActividadApp($data);
}

interface InterfaceFuncionesCampania{
    public function BusquedaCampaniaApp();
    public function InsertaCampaniaApp($data);
    public function ActualizarCampaniaApp($data);
    public function EliminarCampaniaApp($data);
}
?>