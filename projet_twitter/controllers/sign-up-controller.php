<?php //require_once MODEL_PATH . 'sign-up-model.php'



// Page d'inscription
function signupIndex()
{
    $view_data = ['html_title' => 'Inscription'];

    loadView( 'sign-up' , $view_data);
}

?>