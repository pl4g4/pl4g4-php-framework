<?php

class Home extends Controller{

	public function index(){
		$user = User::first()->toArray();
		$this->view('home/index.html.twig', array('name' => $user['name']));	
	}

	public function test(){
		echo 'test';
	}

	public function createUser(){
		User::create([
			'name' => 'pl4g4'
		]);
	}

}