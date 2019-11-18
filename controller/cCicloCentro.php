<?php

include_once '../model/ofertaModel.php';

$CodigoCiclo=filter_input(INPUT_GET,'cod_ciclo');
    
  
    $oferta=new ofertaModel();
    $oferta->setCod_ciclo($CodigoCiclo);
    
    $oferta->setListCentros();
    $listaOfertas=$oferta->getListJsonString();
    
    echo $listaOfertas;

