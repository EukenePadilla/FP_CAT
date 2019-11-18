<?php

    include_once '../model/offerModel.php';
    
    $cod_ciclo=filter_input(INPUT_GET,'cod_cycle');
    
    $offer=new offerModel();
    
    $offer->setCod_ciclo($cod_ciclo);
    
    $offer->setListShools();
    
    $offertList=$offer->getListJsonString();
    echo $offertList;
    