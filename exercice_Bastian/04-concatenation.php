<?php
function concatenation(String $string1, String $string2){
    return $string1 . $string2;
}

function concatenationV2(String $prenom, String $nom){
    strtolower($prenom) . " ". strtoupper($nom);
}