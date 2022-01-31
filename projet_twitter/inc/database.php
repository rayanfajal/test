<?php 

define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'ET_MON_COMPTE_TWITTER'); 

define( 'SALT', 'cube' );
define('PEPPER', 'blop' );

$mysqli = mysqli_connect( DB_HOST, DB_USER, DB_PASS, DB_NAME);


?>