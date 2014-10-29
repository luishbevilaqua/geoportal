<?

class Login extends Controller {

    public function __construct() {
        parent::Controller();

        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }

    public function index() {
        
        $this->load->view('/login_form');
    }

    public function submit() {

        if ($this->_submit_validate() === FALSE) {
            $this->index();
            return;
        } else {
            redirect('/principal');
        }
    }

    private function _submit_validate() {

        $this->form_validation->set_rules('username', 'Usuário', 'trim|required|callback_authenticate');
        $this->form_validation->set_rules('password', 'Senha', 'trim|required');
        $this->form_validation->set_message('authenticate', 'Login inválido. Tente novamente!.');
        return $this->form_validation->run();
    }

    public function authenticate() {

        return Current_User::login($this->input->post('username'), $this->input->post('password'));
    }

}

?>
