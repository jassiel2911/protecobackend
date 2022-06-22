<?php

namespace App\Repositories;

class Asesorias extends HttpRequestClass
{

	public function __construct()
	{

		parent::__construct();
	}

	/**
	 * Get All Post
	 *
	 * @return mixed
	 */
	public function all()
	{
		return $this->get('consultancies');
	}

	public function find($id)
	{
		return $this->get('consultancies');
	}

	public function update($id,$storeData)
	{
		return $this->put_a('consultancies'. '/' . $id,$storeData,$id);
	}
}