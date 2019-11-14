<?php
include_once '../model/familiasModel.php';

    $familiasProfesionales=new familiasModel();
    
    $familiasProfesionales->setAllFamiliasProfesionales();
    $listFamiliasProfesionalesJson=$familiasProfesionales->getFamiliasProfesionalesJson();
    
    echo $listFamiliasProfesionalesJson;
