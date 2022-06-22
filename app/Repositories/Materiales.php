<?php

namespace App\Repositories;

class Materiales extends HttpRequestClass
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

		return $this->get('material');
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
		return $this->get("material/{$id}");
	}

	public function create($storeData)
	{
		return $this->post_m('materials',$storeData);
	}

	public function update($id,$storeData)
	{
		return $this->put_m('material'. '/' . $id,$storeData,$id);
	}
	public function remove($id)
	{
		return $this->delete('material'. '/' . $id);
	}
}