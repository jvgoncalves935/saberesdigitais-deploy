<?php
    

    $idCurso = $_REQUEST['idCurso'];
    $_query = TableRegistry::get('materias')->find();
    $_query = TableRegistry::getTableLocator()->get('materias')->find()
                                                               ->where(['CursoID'=>$idCurso]);

    $materias = array();
    foreach($_query as $materia){
        $materias[$materia['MateriaID']] = $materia['Nome'];
    }

    $materiasArrayString = "";
    foreach($materias as $letra){
        $materiasArrayString = $materiasArrayString.$letra;
    }

    echo $materiasArrayString;
?>