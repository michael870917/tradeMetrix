<?php
class Constantes{
    /**
     * @abstract Metodos de comparacion -> Consultas sql
     * @example  campo IGUAL_DB valor
     * 
     */ 
    const IGUAL_DB = "igual";
    const DIFERENTE_DB = "diferente";
    const MENOR_DB = "menor";
    const MAYOR_DB = "mayor";
    const MENORIGUAL_DB = "menorigual";
    const MAYORIGUAL_DB = "mayorigual";
    
    /**
     * @abstract Tipos de consulta que van a ser llamadas
     * @param VIEW -> salida para hacer uso de una vista
     * @param STORED -> salida para hacer uso de un stored
     * @param FUNCTIONS -> salida para hacer uso de una funcion
     * @example select * from VIEW
     * 
     */ 
    const VIEW = "vista";
    const STORED = "stored";
    const FUNCTIONS = "functions";
    
    /**
     * @abstract Tipos de salida a ocupar en el procesamiento de datos sobre creacion y manejo de objetos
     * @param OUTPUTSIMPLE -> salida del query como un objeto unico
     * @param OUTPUTSLISTA -> salida del query como un arreglo de objetos
     * 
     */ 
    const OUTPUTSIMPLE = "simple";
    const OUTPUTSLISTA = "lista";
    /**
     * @abstract Tipos de salida a ocupar en el procesamiento de datos
     * @param OUTPUTXML -> salida del query convertido a xml
     * @param OUTPUTJSON -> salida del query convertido a json
     * 
     */
    const OUTPUTXML = "xml";
    const OUTPUTJSON = "json";
    
    /**
     * @abstract Constantes para validacion de consultas
     * 
     */
     
     
     
     
     
    
    const ONLY_IDPRODUCTO = "productos.id";
    const ONLY_IDUSUARIO = "usuarios.id";
    const ONLY_IDCATTIPOPRODUCTO = "cat_tipo_productos.id";
    const ONLY_IDCATORIGEN = "cat_origen.id";    
    const ONLY_NOMBREPRODUCTO = "productos.nombre";
    const ONLY_IDTABLERO = "tableros.id";
    const ONLY_IDCATROL = "cat_roles.id";
    const ONLY_IDREPORTE = "reporte.id";
    const ONLY_IDCATVISUALIZACION = "cat_visualizaciones.id";
    const ONLY_IDAUDITORIA = "auditoria.id";    
    const ONLY_IDMARCACAMPANIA = "campanias.id_marca";
    const ONLY_IDGENERICO = "id";
    const ONLY_IDUSUARIOTOROL = "usuarios_to_roles.id";
    const ONLY_IDCATPLAZA = "cat_plaza.id";
    const ONLY_IDEVENTO = "evento.id";
    const ONLY_FECHAINIEVENTO = "evento.hora_ini";
    const ONLY_FECHAFINEVENTO = "evento.hora_fin";
    const ONLY_IDCAMPANIA = "campanias.id";
    const ONLY_IDCATREGION = "cat_region.id";
    const ONLY_IDCATMARCA = "cat_marcas.id";
    const ONLY_ACTIVOEVENTO = "evento.activo";
    const ONLY_IDCATCC = "cat_cc.id";
    const ONLY_IDUSUARIOTOEVENTO = "evento_to_usuarios.id_usuario";
    const ONLY_IDUSUARIOTOREGION = "region_to_usuarios.id_usuario";  
    const ONLY_IDREGIONTOREGION = "region_to_usuarios.id_region";
    const ONLY_IDPREGUNTA = "preguntas.id";
    const ONLY_IDFORMA = "formas.id";
    const ONLY_IDPREGUNTATORESPUESTA = "respuestas.id_pregunta";
    const ONLY_IDPREGUNTATOOPCIONES = "opciones.id_pregunta";
    const ONLY_IDCLASIFFORMA = "formas.id_clasif";
    const ONLY_ESTATUSFORMA = "formas.estatus";
    const ONLY_IDACTIVIDAD = "actividades.id";
    const ONLY_IDFORMATOACTIVIDADES = "actividades_to_formas.id_forma";
    const ONLY_IDCAMPANIATOACTIVIDAD = "campanias_to_actividades.id";
    const ONLY_IDCAMPANIA_CAMPANIATOACTIVIDAD = "campanias_to_actividades.id_campanias";

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    
    const COMPARA_ONLY_IDAUDITORIA = "id_auditoria";
    const COMPARA_ONLY_IDUSUARIOS = "id_usuarios";
    const COMPARA_ONLY_IDCAMPANIAS = "id_campanias";
    const COMPARA_ONLY_IDACTIVIDAD = "id_actividades";
    const COMPARA_ONLY_IDEVENTO ="id_evento";
    const COMPARA_ONLY_IDUSUARIO ="id_usuario";
    const COMPARA_ONLY_IDPLAZA = "id_plaza";
    const COMPARA_ONLY_IDCAMPANIA = "id_campania";
    const COMPARA_ONLY_IDTIPOFOTO = "id_tipo_foto";
    const COMPARA_ONLY_IDHERRAMIENTA = "id_herramienta";
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    
    const ALIAS_IDUSUARIO = "a.idUsuario";
    const ALIAS_IDCAMPANIA = "a.idCampania";
    const ALIAS_NOMBRECAMPANIA = "a.nombreCampania";
    const ALIAS_IDCAMPANIATOHERRAMIENTA = "a.idCampaniaHerramienta";
    const ALIAS_IDCATROLUSUARIO = "a.idRolUsuario";
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //const IDPRODUCTO = "productos.id";
    //const IDUSUARIO = "usuarios.id";
    //const IDTIPOPRODUCTO = "cat_tipo_productos.id";
    //const IDORIGEN = "cat_origen.id";
    //const NOMBREPRODUCTO = "productos.nombre";
    //const IDTABLERO = "tableros.id";
    //const IDCATROL = "cat_roles.id";
    //const IDREPORTE = "reporte.id";
    //const IDVISUALIZACION = "cat_visualizaciones";
    //const IDAUDITORIA = "auditoria.id";
    //const IDMARCAAUDITORIA = "campanias.id_marca";
    //const IDGENERICO = "id";
    //const IDCATPLAZA = "cat_plaza.id";
    //const IDEVENTO = "evento.id";
    //const FECHAINIEVENTO = "evento.hora_ini";
    //const FECHAFINEVENTO = "evento.hora_fin";
    //const IDCAMPANIA = "campanias.id";
    //const IDREGION = "cat_region.id";
    //const IDCATMARCA = "cat_marcas.id";
    //const ACTIVOEVENTO = "evento.activo";
    //const IDCC = "cat_cc.id";
    //const IDUSUARIOTOEVENTO = "evento_to_usuarios.id_usuario";
    //const IDUSUARIOTOREGION = "region_to_usuarios.id_usuario";  
    //const IDREGIONTOREGION = "region_to_usuarios.id_region";    
    //const IDPREGUNTA = "preguntas.id";
    //const IDFORMAPREGUNTA = "formas.id";
    //const IDPREGUNTARESPUESTA = "respuestas.id_pregunta";
    //const IDPREGUNTAOPCIONES = "opciones.id_pregunta";
    //const IDFORMA = "formas.id";
    //const IDCLASIFFORMA = "formas.id_clasif";
    //const IDSTATUSFORMA = "formas.estatus";
    //const IDACTIVIDAD = "actividades.id";
    //const IDFORMATOACTIVIDADES = "actividades_to_formas.id_forma";
    //const IDCAMPANIAACTIVIDAD = "campanias_to_actividades.id";
    //const IDTIPOACTIVIDADCAMPANIA = "campanias_to_actividades.id_campanias";
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //const IDAUDITORIADELETE = "id_auditoria";
    //const IDUSUARIODELETE = "id_usuarios";
    //const IDCAMPANIADELETE = "id_campanias";
    //const IDACTIVIDADDELETE = "id_actividades";
    //const IDEVENTOONLY ="id_evento";
    //const IDUSUARIOONLY ="id_usuario";
    //const IDPLAZADELETE = "id_plaza";
    //const IDCAMPANIADELETE2 = "id_campania";
    //const IDTIPOFOTODELETE = "id_tipo_foto";
    //const IDHERRAMIENTADELETE = "id_herramienta";
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////
        
    //const IDUSUARIOVAL = "a.idUsuario";
    //const IDCAMPANIAVAL = "a.idCampania";
    //const NOMBRECAMPANIAVAL = "a.nombreCampania";
    //const IDCAMPANIAHERRAMIENTA = "a.idCampaniaHerramienta";
    
}



class Utilities{
    /**
     * @function getParam -> devuelve el valor del elento enviado ya sea por get, post, request
     * @abstract Almacenamiento de las variables enviadas desde el navegador
     * @param $paramName -> nombre del valor recibido ya sea por get,post,request
     * @param $default -> asignar valor por default si lo deseamos asi
     */ 
    public function getParam($paramName, $default = "") {
        return (isset($_REQUEST[$paramName]) ? $_REQUEST[$paramName] : $default);
    }
    /**
     * @abstract Recorre todas las posibles entradas enviadas por el navegador
     * para hacer limpieza haciendo uso del metodo limpiarParametros()     
     * 
     */ 
    public function limpiarEntrada(){
        foreach($_POST as $key => $value){
            $_POST[$key] =addslashes($this->limpiarParametros($value));
        }
        
        foreach($_GET as $key => $value){
            $_GET[$key] =addslashes($this->limpiarParametros($value));
        }                
        
        foreach($_REQUEST as $key => $value){
            $_REQUEST[$key] =addslashes($this->limpiarParametros($value));
        }
    }
    
    /**
     * @function Encriptacion -> Encriptacion de la variable enviada
     * @abstract Metodo de encrptacion para seguridad de la variable
     * @param $valor -> variable a encriptar
     * 
     */ 
    public function Encriptacion($valor){
        return md5($valor);
    }
    
    /**
     * @abstract Limpia todas las entradas de posibles inyecciones sql 
     * asi como tambien de posible incursion de elementos script o html
     *
     */ 
    public function limpiarParametros($valor){
        $valor = str_ireplace("SELECT","",$valor);
        $valor = str_ireplace("FROM","",$valor);
    	$valor = str_ireplace("COPY","",$valor);
    	$valor = str_ireplace("DELETE","",$valor);
    	$valor = str_ireplace("DROP","",$valor);
    	$valor = str_ireplace("DUMP","",$valor);
    	$valor = str_ireplace(" OR ","",$valor);
        $valor = str_ireplace(" AND ","",$valor);
    	$valor = str_ireplace("%","",$valor);
    	$valor = str_ireplace("LIKE","",$valor);
    	$valor = str_ireplace("--","",$valor);
    	$valor = str_ireplace("^","",$valor);
    	$valor = str_ireplace("[","",$valor);
    	$valor = str_ireplace("]","",$valor);
    	$valor = str_ireplace("\\","",$valor);
    	$valor = str_ireplace("!","",$valor);
    	$valor = str_ireplace("¡","",$valor);
    	$valor = str_ireplace("?","",$valor);
    	$valor = str_ireplace("=","",$valor);
    	$valor = str_ireplace("&","",$valor);
        $valor = str_ireplace("*","",$valor);
        $valor = str_ireplace("!=","",$valor);
        $valor = str_ireplace("<","",$valor);
        $valor = str_ireplace(">","",$valor);
        $valor = str_ireplace("<>","",$valor);
        $valor = str_ireplace("<script>","",$valor);
        $valor = str_ireplace("</script>","",$valor);
        $valor = str_ireplace("<html>","",$valor);
        $valor = str_ireplace("</html>","",$valor);
        return trim($valor);    
    }
    /**
     * @function Convierte objeto recibido a arreglo
     * @abstract Elemento objet enviado destinado a convertirse en array (metodo ocupado para > PHP5)
     * 
     */ 
    public function ConvierteObjetoArray($obj){        
        $conversion = (array) $obj;
        return $conversion;
    }
    
    /**
     * @function Convierte arreglo recibido a objeto
     * @abstract Elemento array enviado destinado a convertirse en objet (metodo ocupado para > PHP5)
     * 
     */    
    public function ConvierteArrayObjeto($array){        
        $conversion = (object) $array;
        return $conversion;
    }
    
    /**
     * 
     * 
     */
    public function DecodificaUtf8($valor){
        return utf8_decode($valor);
    } 
}  

?>