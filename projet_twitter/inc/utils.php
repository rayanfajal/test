<?php

// Echo une URL absolue à partir d'un chemin donné
function uri( string $path):void
{
    echo APP_ROOT . $path;
}

// Chargement d'une view
function loadView(string $name, array $data): void
{
    // Transforme les clés de $ data en variable accessibles à la view
    extract($data);

    // Chargement de la view demandée
    require_once PARTIALS_VIEW_PATH . 'header.php';
    require_once VIEW_PATH . $name . '.php';
    require_once PARTIALS_VIEW_PATH . 'footer.php';


    //require_once MODEL_PATH . 'home-model.php';
    //include_once MODEL_PATH . 'home-model.php';
    //require_once MODEL_PATH . $name . '.php';
    //include_once MODEL_PATH . $name . '.php';
    
  


}


?>