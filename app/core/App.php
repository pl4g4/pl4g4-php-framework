<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App {

	protected $controller = 'Home';
	protected $function = 'index';
	protected $params = array();
	public $request;

	public function __construct(){

		$this->request = Request::createFromGlobals();
		$url = $this->parseUrl($this->request);

		if(file_exists('../app/controllers/'.ucfirst($url[0]).'.php')){
			$this->controller = ucfirst($url[0]);
			unset($url[0]);
		}

		require_once ('../app/controllers/'.$this->controller.'.php');

		$this->controller = new $this->controller;

		if(isset($url[1])){

			if(method_exists($this->controller, $url[1])){
				$this->function = $url[1];
				unset($url[1]);
			}

		}

		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->function], $this->params);

	}

	public function parseUrl($request){
		$url = $request->get('url');
		if(isset($url)){
			return $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
		}
	}

}