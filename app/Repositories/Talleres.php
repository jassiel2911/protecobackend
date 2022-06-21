<?php

namespace App\Repositories;

class Talleres extends HttpRequestClass
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

		return $this->get('talleres');
	}

	/**
	 * Find a post
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function find($id)
	{
		return $this->get("taller/{$id}");
	}

	public function create($storeData)
	{
		return $this->post('taller',$storeData);
	}

	public function update($id,$storeData)
	{
		return $this->put('taller'. '/' . $id,$storeData,$id);
	}
	public function remove($id)
	{
		return $this->delete('taller'. '/' . $id);
	}
}