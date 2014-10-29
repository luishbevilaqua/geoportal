<?php
class CreateTables extends Controller {
	
	public function __construct() {
		parent::Controller();
	}
	
	public function index() {
		Doctrine::createTablesFromModels();
		$u = new Usuario_m();
		$u->username = 'visenta';
		$u->password = 'admin';
                $u->nome = 'gustavo';
		$u->save();
		echo 'tabelas criadas!';
	}
	
}