<?php require_once './inc/database.php'; 

define( 'DS',DIRECTORY_SEPARATOR );
define( 'APP_PATH',dirname(__FILE__) . DS );
define( 'CONTROLLER_PATH',dirname(__FILE__) . DS . 'controllers' .  DS);
define( 'MODEL_PATH',dirname(__FILE__) . DS . 'models' .  DS);
define( 'VIEW_PATH',dirname(__FILE__) . DS . 'views' .  DS);
define( 'PARTIALS_VIEW_PATH',dirname(__FILE__) . DS . 'views' .  DS . 'partials' . DS );
define( 'INC_PATH',dirname(__FILE__) . DS . 'inc' .  DS );
define( 'APP_ROOT', 'http://ceci_n_est_pas_un_virus_dev.projet_twitter.bat/');
define( 'APP_NAME', 'ET_MON_COMPTE_TWITTER');

//include_once 'views/partials/header.php';

require_once INC_PATH . 'database.php';
require_once INC_PATH . 'utils.php';

require_once CONTROLLER_PATH . 'home-controller.php';
require_once CONTROLLER_PATH . 'sign-in-controller.php';
require_once CONTROLLER_PATH . 'sign-up-controller.php';
require_once CONTROLLER_PATH . 'erreur404-controller.php';
require_once CONTROLLER_PATH . 'home-model-controller.php';

require_once INC_PATH . 'router.php';


//require_once MODEL_PATH . 'home-model.php';

//require_once  CONTROLLER_PATH . 'database.php';

//mysqli_close( $mysqli);


function dd($arg)
{
    var_dump($arg);
    die;
}

// Inscription
if(!empty($_POST['user']) && !empty($_POST['password'])){

    $user = $_POST['user'];
    $password = $_POST['password'];
    
    if (!trouverUser(getAllUsers(), $user)){
    
        $user = htmlentities($user);
        $password = htmlentities($password);

        $user = strip_tags($user);
        $password = strip_tags($password);

        $password = SALT . $password . PEPPER;
        $password = hash('md5',$password);

        $flag = insertUser($user, $password);

        if($flag){
            echo "<div class=\"classecho\">Inscription réussie</div>";
            //header('location: views/partials/sign-in.php');
        }
        else{
            echo "<div class=\"classecho\">Erreur de connexion</div>";
            //header('location: Formulaire_php.php');
        }
    }
    
    else{
        echo "<div class=\"classecho\">Nom d'utilisateur déjà pris</div>"; 
    }

    //if( trouverUser(getAllUsers(), $user) && !trouverPassword(getAllUsers(), $password)){
        //echo "<div class=\"classecho\">Nom d'utilisateur déjà pris</div>";                                                          
    //}
    //if( trouverUser(getAllUsers(), $user) && trouverPassword(getAllUsers(), $password)){
        //echo "<div class=\"classecho\">Vous avez déjà un compte</div>";
    //}
}

//Connexion

if(!empty($_POST['nom']) && !empty($_POST['motdepasse'])){

    $nom = $_POST['nom'];
    $motdepasse = $_POST['motdepasse'];
    
    $nom = htmlentities($nom);
    $motdepasse = htmlentities($motdepasse);

    $nom = strip_tags($nom);
    $motdepasse = strip_tags($motdepasse);

    $motdepasse = SALT . $motdepasse . PEPPER;
    $motdepasse = hash('md5',$motdepasse);

    if( trouverUser(getAllUsers(), $nom) && trouverPassword(getAllUsers(), $motdepasse)){
        header('location: models/home-model.php');
        //exit();!$user
        
    }

    if( trouverUser(getAllUsers(), $nom) && !trouverPassword(getAllUsers(), $motdepasse)){
        echo "<div class=\"classecho\">Mot de passe incorrect</div>";
    }
    if( !trouverUser(getAllUsers(), $nom)){
        echo "<div class=\"classecho\">Vous n'avez pas de compte</div>";
        //dd($nom);                                                          
    }
}


function getAllUsers(): array
{
    global $mysqli;
    $arr = [];
    
    $req = 'SELECT * FROM profils';
    
    $responses = mysqli_query($mysqli, $req);

    if($responses){
        while($users = mysqli_fetch_assoc($responses)){
            
            $arr[] = $users;
        }
    }

    return $arr;
}
function insertUser($user, $password): bool
{
    global $mysqli;
    $req = "INSERT INTO profils (user, PASSWORD)
    VALUES ('$user','$password')";

    if(mysqli_query($mysqli,$req)){

        return True;
    }
    else{
        return false;
    }

}

function trouverUser($tableau, $utilisateur)
{
    foreach ($tableau as $value) {
        if ($utilisateur === $value['user']) {
            $inscrit = true;
            return $inscrit;
        }
    }
    $inscrit = false;
    return $inscrit;
}

function trouverPassword($tableau, $mdp)
{
    foreach ($tableau as $value) {
        if ($mdp === $value['PASSWORD']) {
            $inscrit1 = true;
            return $inscrit1;
        }
    }
    $inscrit1 = false;
    return $inscrit1;
}
?>