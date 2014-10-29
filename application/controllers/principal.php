<?php

class Principal extends Controller {

    public function __construct() {
        parent::Controller();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('custom_upload');
        $this->load->library('data_util');
        $this->load->library('string_util');

        $this->load->library('messages');
        $this->load->helper('msg');
    }

    public function embreve() {
        $this->load->view('embreve');
    }
    
    public function index() {
        $vars['view'] = 'capa';
        $this->load->view('principal', $vars);
    }
    
}

?>
