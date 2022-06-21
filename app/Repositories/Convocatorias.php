<?php

namespace App\Repositories;

class Convocatorias extends HttpRequestClass
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
		return $this->get('announcement');
	}

	public function find($id)
	{
		return $this->get('announcement');
	}

	public function update($id,$storeData)
	{
		return $this->put_con('announcement'. '/' . $id,$storeData,$id);
	}
}