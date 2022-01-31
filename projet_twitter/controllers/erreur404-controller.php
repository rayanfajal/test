<?php 

// Page erreur 404
function erreurIndex()
{
    $view_data = ['html_title' => 'Erreur 404'];

    loadView( 'Erreur404' , $view_data);
}


?>