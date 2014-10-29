<?
class Login extends Controller {

	public function __construct() {
		parent::Controller();

		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	}

	public function index() {
		
		
		$this->load->view('/intranet/login_form');
	}


	public function submit() {

		if ($this->_submit_validate() === FALSE) {
			$this->index();
			return;
		}

		//$data = array('view'=>'home');
		//$this->load->view('/intranet/principal', $data);
                redirect('intranet/noticia');
	}


	private function _submit_validate() {

		$this->form_validation->set_rules('username', 'Usu�rio',
			'trim|required|callback_authenticate');

		$this->form_validation->set_rules('password', 'Senha',
			'trim|required');

		$this->form_validation->set_message('authenticate','Login inv�lido. Tente novamente!.');

		return $this->form_validation->run();

	}

	public function authenticate() {

		return Current_User::login($this->input->post('username'),
		$this->input->post('password'));

	}

}
?>
