<?php

namespace App\Repositories;

class Herramientas extends HttpRequestClass
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

		return $this->get('tools');
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
		return $this->get("tool/{$id}");
	}

	public function create($storeData)
	{
		return $this->post_h('tools',$storeData);
	}

	public function update($id,$storeData)
	{
		return $this->put_h('tool'. '/' . $id,$storeData,$id);
	}
	public function remove($id)
	{
		return $this->delete('tool'. '/' . $id);
	}
}