<?php

include_once '../model/countryModel.php';

    $selectedContinent=filter_input(INPUT_GET,'continent');
    
    $cCountry=new countryModel();
    $cCountry->setContinent($selectedContinent);
    
    $cCountry->setListByContinent();
    $listCountriesJson=$cCountry->getListCountriesJson();
    
    echo $listCountriesJson;

