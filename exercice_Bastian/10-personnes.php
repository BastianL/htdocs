<?php

function EstMajeur(int $argument){
    if ($argument >= 18){
        return true;
    } else {
        return false;
    }
}

function CalculRetraite(int $age){
    if ($age < 0){
        return "Vous n'êtes pas encore né";
    }
    if ($age == 60){
        return "Vous êtes a la retraite cette année";
    }
    if ($age > 60){
        return 'Vous êtes a la retraite depuis ' . $age - 60 . ' ans';
    }
    else {
        return 'Vous êtes a la retraite dans ' . 60 - $age . ' ans';
    }
}