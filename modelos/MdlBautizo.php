<?php

require_once ("conexion.php");


 class ModeloBautizo{
     // Modelo para mostrar datos de persona
    static public function mdlMostrarPersonaBatizo($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM persona WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		    $stm->execute();
 		    return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM persona 
                                                WHERE NOT EXISTS (SELECT NULL FROM bautizo 
                                                WHERE bautizo.id_persona = persona.id)");
 		
            $stm->execute();
            return $stm->fetchAll();
        }

       
    }

    static public function mdlMostrarPersonaFamilia($idPersona){
            $stm = conexion::conectar()->prepare("SELECT familia.nombres AS familia, familia.id AS CodigoFamilia FROM familia
                                            INNER JOIN formacion_familia ON familia.id = formacion_familia.id_familia
                                            INNER JOIN persona ON persona.id = formacion_familia.id_persona
                                            WHERE persona.id=:idPersona");
 		    $stm -> bindParam(":idPersona", $idPersona, PDO::PARAM_INT);
 		    $stm->execute();
 		    return $stm->fetch();
    }


    // Modelo para mostrar datos de persona
    static public function mdlMostrarBautizoEdit($parametros, $datos){

            $stm = conexion::conectar()->prepare("SELECT bautizo.id, persona.nombres as nombre_persona, persona.apellidos as apellido_persona, bautizo.tomo, bautizo.pagina, bautizo.acta, bautizo.nota_marginal, bautizo.lugar, bautizo.fecha FROM bautizo 
                INNER JOIN persona ON persona.id =:datos");
            $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        
            $stm->execute();
            return $stm->fetchAll();
        }

    //Guardar Bautisos 
    static public function mdlGuardarBautizos($tabla, $datos){
        
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (id_persona, id_familia, id_usuario, tomo, pagina, acta, nota_marginal, lugar, fecha, id_parroquia) VALUES(:id_persona, :id_familia, :id_usuario, :tomo, :pagina, :acta, :nota_marginal, :lugar, :fecha, :id_parroquia)");
        $stm -> bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        $stm -> bindParam(":id_familia", $datos["id_familia"], PDO::PARAM_INT);
        $stm -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stm -> bindParam(":tomo", $datos["tomo"], PDO::PARAM_STR);
        $stm -> bindParam(":pagina", $datos["pagina"], PDO::PARAM_STR);
        $stm -> bindParam(":acta", $datos["acta"], PDO::PARAM_STR);
        $stm -> bindParam(":nota_marginal", $datos["nota_marginal"], PDO::PARAM_STR);
        $stm -> bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
        $stm -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stm -> bindParam(":id_parroquia", $datos["id_parroquia"], PDO::PARAM_INT);

    
        
        if ($stm->execute()){
           
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

    //Mostrar el ultimo Registro Guardado
    static public function mdlMostrarIdGuardado(){
        $stm = conexion::conectar()->prepare("SELECT MAX(id) AS id FROM bautizo");
         $stm->execute();
         return $stm->fetch();
    }


    //Guardar Padrinos Bautizo
    static public function mdlGuardarPadrinos($tabla, $datos){
        
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (id_bautizo, id_persona) VALUES(:id_bautizo, :id_persona)");
        $stm -> bindParam(":id_bautizo", $datos["id_bautizo"], PDO::PARAM_INT);
        $stm -> bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        
    
        
        if ($stm->execute()){
            
           
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

    // Modelo para mostrar datos de persona
    static public function mdlMostrarBautismos($parametros, $datos){

        if($parametros!=null){
            $stm = conexion::conectar()->prepare("SELECT * FROM bautizo WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
 		    $stm->execute();
 		    return $stm->fetch();

        }else{
            $stm = conexion::conectar()->prepare("SELECT bautizo.id, persona.nombres, persona.apellidos, bautizo.tomo, bautizo.pagina, bautizo.acta, bautizo.nota_marginal, bautizo.lugar, bautizo.fecha FROM bautizo 
                                                        INNER JOIN persona ON persona.id = bautizo.id_persona");
 		
            $stm->execute();
            return $stm->fetchAll();
        }

       
    }
 

    static public function mdlModificarBautizos($tabla, $datos){
        
        $stm = conexion::conectar()->prepare("UPDATE $tabla SET id_persona=:id_persona, id_familia=:id_familia, tomo=:tomo, pagina=:pagina, acta=:acta, nota_marginal=:nota_marginal, lugar=:lugar, fecha=:fecha WHERE id=:id");
        $stm -> bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        $stm -> bindParam(":id_familia", $datos["id_familia"], PDO::PARAM_INT);
        $stm -> bindParam(":tomo", $datos["tomo"], PDO::PARAM_STR);
        $stm -> bindParam(":pagina", $datos["pagina"], PDO::PARAM_STR);
        $stm -> bindParam(":acta", $datos["acta"], PDO::PARAM_STR);
        $stm -> bindParam(":nota_marginal", $datos["nota_marginal"], PDO::PARAM_STR);
        $stm -> bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
        $stm -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stm -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
       
  
        if ($stm->execute()){
           
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }


    static public function mdlDatosBautizo($datos){
        $stm = conexion::conectar()->prepare("SELECT bautizo.id, persona.nombres as nombre_persona, persona.apellidos as apellido_persona, bautizo.tomo, bautizo.pagina, bautizo.acta, bautizo.nota_marginal, bautizo.lugar, bautizo.fecha, bautizo.id_usuario, bautizo.id_persona, bautizo.id_familia, usuarios.nombres_apellidos AS sacerdote  FROM bautizo 
        INNER JOIN persona ON persona.id = bautizo.id_persona INNER JOIN usuarios on usuarios.id = bautizo.id_usuario
        WHERE bautizo.id =:datos");
        $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    static public function mdlDatosPadrinosAll($datos){
        $stm = conexion::conectar()->prepare("SELECT padrinos_bautizo.id as id_padrino_padrino1, persona.nombres as nombre_padrino1, persona.apellidos as apellido_padrino1 FROM bautizo 
        INNER JOIN padrinos_bautizo ON padrinos_bautizo.id_bautizo = bautizo.id
        INNER JOIN persona ON persona.id = padrinos_bautizo.id_persona
        WHERE bautizo.id = :datos");
        $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }

   

    //padrinos 1
    static public function mdlDatosPadrinos1($datos){
        $stm = conexion::conectar()->prepare("SELECT padrinos_bautizo.id as id_padrino_padrino1, padrinos_bautizo.id_persona as idPersonaPadrino1, persona.nombres as nombre_padrino1, persona.apellidos as apellido_padrino1 FROM bautizo 
        INNER JOIN padrinos_bautizo ON padrinos_bautizo.id_bautizo = bautizo.id
        INNER JOIN persona ON persona.id = padrinos_bautizo.id_persona
        WHERE bautizo.id = :datos  ORDER BY padrinos_bautizo.id  ASC 
        LIMIT 1");
        $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

     //padrinos 2
     static public function mdlDatosPadrinos2($datos){
        $stm = conexion::conectar()->prepare("SELECT padrinos_bautizo.id as id_padrino_padrino2, padrinos_bautizo.id_persona as idPersonaPadrino2,persona.nombres as nombre_padrino2, persona.apellidos as apellido_padrino2 FROM bautizo 
        INNER JOIN padrinos_bautizo ON padrinos_bautizo.id_bautizo = bautizo.id
        INNER JOIN persona ON persona.id = padrinos_bautizo.id_persona
        WHERE bautizo.id = :datos  ORDER BY padrinos_bautizo.id  DESC 
        LIMIT 1");
        $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    //Modificar Padrino
    static public function mdlModificarPadrinos($tabla, $datos){
        
        $stm = conexion::conectar()->prepare("UPDATE $tabla SET id_bautizo=:id_bautizo, id_persona=:id_persona WHERE id=:id");
        $stm -> bindParam(":id_bautizo", $datos["id_bautizo"], PDO::PARAM_INT);
        $stm -> bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        $stm -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        
    
        
        if ($stm->execute()){
            
           
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }



    //Eliminar Padrino
    static public function mdlEliminarPadrino($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_bautizo=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }

     //Eliminar Bututizo
     static public function mdlEliminarBautizo($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
    }

 }