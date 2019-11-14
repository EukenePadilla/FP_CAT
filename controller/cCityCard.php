<?php
include_once '../model/cityModel.php';

    $idCity= filter_input(INPUT_GET, 'idCity');

    $city=new cityModel();
    $city->setID($idCity);
    
    $city->findIdCity();
    $cityJson=$city->getObjCityJson();

    echo $cityJson;

