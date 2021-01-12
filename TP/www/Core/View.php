<?php

namespace App\Controller;

class View
{


	private $template; // back ou front
	private $view; // home admin login et logout

	public function __construct( $view, $template ){

		$this->setTemplate($template);
		$this->setView($view);

	}

	public function setTemplate($template){
		if(file_exists("Views/Templates/".$template.".tpl.php")){
			$this->view = "Views/Templates/".$template.".tpl.php";
		}else{
			die("Erreur de template");
		}
	}

	public function setView($view){
		if(file_exists("Views/".$view.".v.php")){
			$this->template = "Views/".$view.".v.php";
		}else{
			die("Erreur de vue");
		}
	}

	//$view->assign("pseudo", "Prof");
	public function assign($key, $value){
		$this->data[$key] = $value;
	}


	public function destruct(){
		//$this->data = ["pseudo"=>"Super Prof"] ==> $pseudo = "Super Prof"
		/*
		foreach ($this->data as $key => $value) {

			// $key = "pseudo"
			// $$key = $"pseudo" = $pseudo
			$$key = $value;
		}
		*/
		extract($this->data);

		echo $this->template;
	}


}






