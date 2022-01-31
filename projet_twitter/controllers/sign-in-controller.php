<?php //require_once '/models/home-model.php'; 




// Page de connexion
function signinIndex()
{
    $view_data = ['html_title' => 'Connexion'];

    loadView( 'sign-in' , $view_data);
}


?>