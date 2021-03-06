<?php

namespace App;

use App\Core\Router;
use App\Core\Helpers as h;

//require "Core/Router.php";
//require "Core/Security.php";

require "Autoload.php";



// $uri  => /se-connecter?user_id=2 => /se-connecter
$uriExploded = explode("?", $_SERVER["REQUEST_URI"]);

$uri = $uriExploded[0];

$router = new Router($uri);

$c = $router->getController();
$a = $router->getAction();



if( file_exists("./Controllers/".$c.".php")){

	include "./Controllers/".$c.".php";
	// SecurityController =>  App\Controller\SecurityController

	if(class_exists($c)){
		// $controller ====> SecurityController
		$c = "App\\Controller\\".$c;
		$cObjet = new $c();
		if(method_exists($cObjet, $a)){
			$cObjet::$a();

		}else{
			die("L'action' : ".$a." n'existe pas");
		}

	}else{
	
		die("La classe controller : ".$c." n'existe pas");
	}


}else{
	die("Le fichier controller : ".$c." n'existe pas");
}








