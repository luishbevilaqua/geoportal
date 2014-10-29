<?
class Principal extends Controller {

	public function index() {

		$data['view'] = 'home';
		$data['titulo'] = 'esse eh o meu titulo';

		//$this->load->vars($data);

		$this->load->view('/intranet/principal', $data);
	}

}
?>