<?php
class Usuario_m extends Doctrine_Record {

	public function setTableDefinition() {
		$this->hasColumn('username', 'string', 50, array('unique' => 'true'));
		$this->hasColumn('password', 'string', 100);
		$this->hasColumn('nome', 'string', 200);

	}

	public function setUp() {
		$this->setTableName('usuario');
		$this->actAs('Timestampable');
		$this->hasMutator('password', '_encrypt_password');
	}

	protected function _encrypt_password($value) {
		$salt = '#*seCrEt!@-*%';
		$this->_set('password', md5($salt . $value));
	}

	public function numUsers() {

		$result = Doctrine_Query::create()
		->select('COUNT(*) as num_users')
		->from('Usuario_m')
		->setHydrationMode(Doctrine::HYDRATE_ARRAY)
		->fetchOne();

		return $result['num_users'];
	}

	public function countAllByCriterio($criterio = "") {
		$result = Doctrine_Query::create()
		->select('COUNT(*) as num_users')
		->from('Usuario_m')
		->where('nome like ?', '%'.$criterio.'%')
		->setHydrationMode(Doctrine::HYDRATE_ARRAY)
		->fetchOne();

		return $result['num_users'];
	}

	public function getListUser($limit, $offset, $column, $sort) {

		$orderby = $column .' '. $sort;

		$result = Doctrine_Query::create()
		->select('u.*')
		->from('Usuario_m u')
		->limit($limit)
		->offset($offset)
		->orderBy($orderby)
		->setHydrationMode(Doctrine::HYDRATE_ARRAY)
		->execute();

		//print_r($result);


		return $result;

	}

	public function getListUserByCriterio($limit, $offset, $column, $sort, $criterio) {

		$orderby = $column .' '. $sort;

		$result = Doctrine_Query::create()
		->select('u.*')
		->from('Usuario_m u')
		->where('u.nome like ?', '%'.$criterio.'%')
		->limit($limit)
		->offset($offset)
		->orderBy($orderby)
		->setHydrationMode(Doctrine::HYDRATE_ARRAY)
		->execute();

		//print_r($result);


		return $result;

	}

}
