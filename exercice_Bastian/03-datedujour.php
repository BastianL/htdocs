<?php

function DateDuJour(){
    $date = new DateTime();
    echo $date->format('d/m/Y');
    return $date->format('d/m/Y');
}

DateDuJour();