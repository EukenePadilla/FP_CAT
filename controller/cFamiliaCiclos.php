<?php

include_once '../model/ciclosModel.php';
include_once '../model/familiasModel.php';

$CodigoFamilia=filter_input(INPUT_GET,'codigoFamilia');
    
//     $familia=new familiasModel();
//     $familia->setNom_familia_eu($selectedFamilia);
//     $CodigoFamilia=$familia->setFindCodFamilia();
    
    $ciclos=new ciclosModel();
    $ciclos->setCod_familia($CodigoFamilia);
    
    $ciclos->setListByFamilia();
    $ListCiclosJson=$ciclos->getListCiclosJson();
    
    echo $ListCiclosJson;

