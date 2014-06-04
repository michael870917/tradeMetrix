<?php
include_once ("DBConfig.php");
include_once ("DaoAbstract.php");
include_once ("PreguntaDataDAO.php");
include_once ("InterfacesDAO.php");
header('Content-Type: text/html; charset=UTF-8');
class PreguntaDAO extends DaoAbstract implements InterfaceFuncionesPreguntas{    
    
    private $_contentArrayTabla;
    private $_clave;
    private $_id;
    private $_value;
    private $_insertField;
    private $_campos;
    private $_query;
    private $_resultSet;
        
    public function __construct(){
        $this->_contentArrayTabla = new ManejadorPreguntaSQL();
        parent::__construct();
    }
    
    public function __destruct(){
        unset($this->_contentArrayTabla);
        parent::__destruct();
    }
    
    public function InsertaPreguntaApp($data){
        $this->_insertField = $this->_contentArrayTabla->CamposPregunta();
        array_shift($this->_insertField);
        $this->_resultSet = $this->insert($this->link, $this->_contentArrayTabla->TablaPregunta(), $this->_insertField, substr($this->_contentArrayTabla->TipoCamposPregunta(), 1), $data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_id = ($this->_resultSet > 0 ? $this->_resultSet : false);
        }else{
            $this->_id = false;
        }                
        return $this->_id;
    }
           
    public function ActualizarPreguntaApp($data){
        $this->_campos = $this->_contentArrayTabla->CamposPreguntaActualizacion();
        $this->_clave = $this->_contentArrayTabla->CamposLLavePreguntaActualizacion();
        $this->_resultSet = $this->update($this->link,$this->_contentArrayTabla->TablaPregunta(),$this->_campos,$this->_clave,$this->_contentArrayTabla->TipoCamposPreguntaActualizacion(),$data);                
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function EliminarPreguntaApp($data){
        $this->_clave = $this->_contentArrayTabla->CamposLLavePreguntaEliminacion();
        $this->_resultSet = $this->delete($this->link,$this->_contentArrayTabla->TablaPregunta(),$this->_clave,$this->_contentArrayTabla->TipoCamposPreguntaEliminacion(),$data);
        if($this->_resultSet != null || $this->_resultSet != ""){
            $this->_value=array_pop($data);
            $this->_id = ($this->_value > 0 ? $this->_value : false);    
        }else{
            $this->_id = false;
        }
        return $this->_id;
    }
    
    public function BusquedaPreguntasApp($filtro=null){
        $this->_query = "SELECT 
                idPregunta,idFormaPregunta,idTipoPregunta,tipoPregunta,idTipoRespuestaPregunta,tipoRespuestaPregunta
                ,idClasificacionRespuestaPregunta,clasificacionRespuestaPregunta,pregunta
                FROM 
                (
                SELECT 
                preguntas.id as idPregunta, id_forma as idFormaPregunta,id_tipo as idTipoPregunta,id_tipo_respuesta as idTipoRespuestaPregunta
                ,id_clasif_resp as idClasificacionRespuestaPregunta,pregunta as pregunta,cat_tipo_pregunta.tipo_pregunta as tipoPregunta
                ,cat_tipo_respuesta.tipo_respuesta as tipoRespuestaPregunta,clasif_respuesta.clasificacion as clasificacionRespuestaPregunta
                FROM 
                preguntas
                INNER JOIN cat_tipo_pregunta ON cat_tipo_pregunta.id=preguntas.id_tipo
                INNER JOIN cat_tipo_respuesta ON cat_tipo_respuesta.id=preguntas.id_tipo_respuesta
                INNER JOIN clasif_respuesta ON clasif_respuesta.id=preguntas.id_clasif_resp
                INNER JOIN formas ON formas.id=preguntas.id_forma
                ".($filtro != "" ? " WHERE ".$filtro : "")
                .") as a";
                
           //echo $this->_query;      
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
    
    public function BusquedaRespuestasApp($filtro){
        $this->_query = "SELECT
                        id as idRespuesta,id_evento as idEventoRespuesta,id_pregunta as idPreguntaRespuesta,id_forma as idFormaRespuesta
                        ,id_usuario as idUsuarioRespuesta,respuesta
                        from respuestas
                ".($filtro != "" ? " WHERE ".$filtro : "");
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
    
    public function BusquedaOpcionesApp($filtro){
        $this->_query = "SELECT
                        id as idOpcion,id_pregunta as idPreguntaOpcion,id_opcion as idOpcionElegir,observacion as observacionOpcion
                        ,requerido as requeridoOpcion
                        from opciones
                ".($filtro != "" ? " WHERE ".$filtro : "");
        $this->_resultSet=$this->getBySqlQueryTwo($this->link,$this->_query);
        if(count($this->_resultSet) > 0 || $this->_resultSet != null){
            $Rs=$this->_resultSet;
        }else{
            $Rs=false;
        }
        return $Rs;
    }
}

?>