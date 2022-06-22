<?php

namespace App\Repositories;

class Temas extends HttpRequestClass
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
	public function all($id)
	{
		return $this->get('topics'. '/' . $id);
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
		return $this->get("topic/{$id}");
	}

	public function create($storeData)
	{
		return $this->post_t('topics',$storeData);
	}

	public function update($id,$storeData)
	{
		return $this->put_t('topic'. '/' . $id,$storeData,$id);
	}
	public function remove($id)
	{
		return $this->delete('topic'. '/' . $id);
	}

}