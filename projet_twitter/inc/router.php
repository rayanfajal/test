<?php

$action = isset($_GET['url']) ? $_GET['url'] : '';

switch( $action ){

    case '':
        homeIndex();
        break;

    case 'sign-in':
        signinIndex();
        break;

    case 'sign-up':
        signupIndex();
        break;


    //case 'home-model':
    //    erreurIndex();            
    //    break;

    default:
        erreurIndex();
        break;


        
}

?>