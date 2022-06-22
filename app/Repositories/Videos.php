<?php

namespace App\Repositories;

class Videos extends HttpRequestClass
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
		return $this->get('videos'. '/' . $id);
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
		return $this->get("video/{$id}");
	}

	public function create($storeData)
	{
		return $this->post_v('videos',$storeData);
	}

	public function update($id,$storeData)
	{
		return $this->put_v('video'. '/' . $id,$storeData,$id);
	}
	public function remove($id)
	{
		return $this->delete('video'. '/' . $id);
	}

}