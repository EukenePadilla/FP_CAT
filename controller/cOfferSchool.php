<?php

include_once '../model/offerModel.php';

$cod_centro=filter_input(INPUT_GET,'cod_school');

$offer=new offerModel();
$offer->setCod_centro($cod_centro);

$offer->setListCycles();
$offerList=$offer->getListJsonString();

echo $offerList;