<?php
// put all new includes/required files here
// require_once('../Controller/UserFunctions.php');
// require_once('../Controller/checkuser.php');

spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/SeniorSys/Model/'.$class.'.php';
});


?>