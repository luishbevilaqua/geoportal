<?php
class Usuario extends Controller {

	public function  __construct() {
		parent::Controller();

		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		$this->load->library('messages');
		$this->load->helper('msg');
	}

	public function index($column = "id", $sorting = "DESC", $criterio=0, $offset = 0) {

		if($this->input->post('procnome'))
		$criterio = $this->input->post('procnome');

		$per_page = 10;

		$user = new Usuario_m();

		$vars['usuarios'] = (!empty($criterio)) ? $user->getListUserByCriterio($per_page, $offset, $column, $sorting, $criterio) : $user->getListUser($per_page, $offset, $column, $sorting);
		$vars['view'] = 'usuario_list';
		$vars['page'] = $offset;
		$vars['sort'] = ($sorting == 'DESC') ? 'ASC' : 'DESC';
		$vars['criterio'] = $criterio;

		$num_users = (!empty($criterio)) ? $user->countAllByCriterio($criterio) : $user->numUsers();

		if ($num_users > $per_page) {
			$this->load->library('pagination');

			$config['base_url'] = base_url() . index_page() . "/intranet/usuario/index/".$column."/".$sorting."/".$criterio."/";
			$config['total_rows'] = $num_users;
			$config['per_page'] = $per_page;
			$config['uri_segment'] = 7;
			$this->pagination->initialize($config);

			$vars['pagination'] = $this->pagination->create_links();
		}

		$this->load->view('/intranet/principal', $vars);
	}

	public function edit($id) {
		$vars['user'] = Doctrine::getTable('Usuario_m')->find($id);
		$vars['view'] =  'usuario_form';
		$vars['form_action'] = 'update/'.$id;

		$this->load->view('/intranet/principal', $vars);
	}

	public function create() {
		$vars = array("view"=>"usuario_form", "form_action"=>"save");
		$this->load->view('/intranet/principal', $vars);
	}

	public function save() {
		if ($this->_submit_validate() === FALSE) {
			$this->create();
			return;
		} else {
			$u = new Usuario_m();
			$u->nome = $this->input->post('nome');
			$u->username = $this->input->post('username');
			$u->password = $this->input->post('password');
			$u->save();

			$this->messages->add('Usuário criado com sucesso!', 'success');
			 
			return $this->index();
		}
	}

	public function update($id) {
		if ($this->_submit_validate('update') === FALSE) {
			$this->edit($id);
			return;
		} else {
			$senha = $this->input->post('password');
			 
			$u = Doctrine::getTable('Usuario_m')->find($id);
			$u->nome = $this->input->post('nome');
			$u->username = $this->input->post('username');
			if(!empty($senha))
			$u->password = $senha;
			$u->save();

			$this->messages->add('Usuário atualizado com sucesso!', 'success');

			redirect('/intranet/usuario');
		}
	}

	public function delete($id) {
		$u = Doctrine::getTable('Usuario_m')->find($id);
		$u->delete();

		$this->messages->add('Usuário removido com sucesso!', 'success');

		redirect('/intranet/usuario');
	}

	private function _submit_validate($action = 'insert') {

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		$this->form_validation->set_rules('nome', 'Nome',
                'trim|required|callback_authenticate');

		$this->form_validation->set_rules('username', 'Usuário',
                'trim|required|callback_authenticate');

		if($action == 'insert') {
			$this->form_validation->set_rules('password', 'Senha',
	                'trim|required|callback_authenticate');
		}

		return $this->form_validation->run();
		return true;
	}


}


?>
