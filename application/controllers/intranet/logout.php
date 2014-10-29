<?php
class Logout extends Controller {
    
        public function __construct() {
            parent::Controller();
            $this->load->library('session');
        }

	public function index() {

		$this->session->sess_destroy();
		$this->load->view('intranet/logout');
	}

}
