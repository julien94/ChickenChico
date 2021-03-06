<?php

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

spl_autoload_register(function ($classe)
{
    $chemins = array( 'model/metier/Entity', 'controleur', 'core/form', 'core', 'model/dao', 'model/service', 'model/metier');
    foreach($chemins as $chemin)
    {
        if(file_exists($chemin.'/'.$classe.'.php')){
            require (ROOT.$chemin.'/'.$classe.'.php');
        }
    }
});

