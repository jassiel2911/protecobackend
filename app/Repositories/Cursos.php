<?php


namespace App\Repositories;

class Cursos extends HttpRequestClass
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

		return $this->get('courses');
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
		return $this->get("course/{$id}");
	}

	public function create($storeData)
	{
		return $this->post_c('course',$storeData);
	}

	public function update($id,$storeData)
	{
		return $this->put_c('course'. '/' . $id,$storeData,$id);
	}
	public function remove($id)
	{
		return $this->delete('course'. '/' . $id);
	}
}