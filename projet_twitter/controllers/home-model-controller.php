<?php 

// Page d'arrivée (Twitter)
function twitterIndex()
{
    $view_data = ['html_title' => 'Twitter'];

    loadView( 'home-model' , $view_data);
}

?>