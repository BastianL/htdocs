<?php

function PasswordLength(string $password){
    if (strlen($password) >= 8){
        return true;
    } else {
        return false;
    }
}

function PasswordCheck(string $password){
    if (PasswordLength($password)){
        $chiffre = false;
        $majuscule = false;
        $minuscule = false;
        for($i = 0; $i < strlen($password); $i++){
            if (is_numeric($password[$i])){
                $chiffre = true;
            }
            if (ctype_upper($password[$i])){
                $majuscule = true;
            }
            if (ctype_lower($password[$i])){
                $minuscule = true;
            }
        }
        if ($chiffre && $majuscule && $minuscule){
            return true;
        }
    }
    return false;
}

function regexPasswordCheck(string $password){
    if (is_null(preg_match('/[a-z]+[A-Z]+[0-9]+/', $password, $matches, PREG_UNMATCHED_AS_NULL))){
        return false;
    }
    else {
        return true;
    }
}

if (regexPasswordCheck("uF8jklmn")){
    echo "mot de passe valide";
} else {
    echo "erreur programme faux négatif";
}
if (regexPasswordCheck("ufijklmn")){
    echo "erreur programme faux positif";
} else {
    echo "mot de passe invalide";
}