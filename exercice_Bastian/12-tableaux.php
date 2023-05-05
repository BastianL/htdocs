<?php

$tableau = ['DEVOLDERE', 'CHATELOT', 'THIRY', 'ROCHE', 'LEROY'];
$nulltableau = [];
function PremierElementTableau(array $tableau){
    if (count($tableau) > 0){
    return $tableau[0];
    } else {
        return null;
    }
}

function DernierElementTableau(array $tableau){
    $k = count($tableau);
    if ($k > 0){
    return $tableau[$k];
    } else {
        return null;
    }
}


echo PremierElementTableau($nulltableau);