<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller {

	function __contruct(){}
	
	protected function model($model){	
		require_once('../app/models/'.$model.'.php');
		return new $model();
	}

	protected function view($view, $data = array()){
		
		Twig_Autoloader::register();
		$twigLoader = new Twig_Loader_Filesystem('../app/views');
		$twig = new Twig_Environment($twigLoader);
		$template = $twig->loadTemplate($view)->display($data);

		$response = new Response($template, 100);

		return $response->send();

	}

	protected function request(){
		return Request::createFromGlobals();
	}

}