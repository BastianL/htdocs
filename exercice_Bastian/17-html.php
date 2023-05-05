<?php

function Html_List(String $nomliste, array $elementsliste){
    $nomliste = "<h3>$nomliste</h3>\n";
    $contenuliste = "<ul> \n";
    for($i = 0; $i < count($elementsliste); $i++){
        $contenuliste = $contenuliste . '<li>' . $elementsliste[$i] . "</li>\n";
    }
    $contenuliste = "$contenuliste</ul>";
    return $nomliste . $contenuliste;
}echo Html_list("Liste", ["element 1", "element 2", "element 3"]);