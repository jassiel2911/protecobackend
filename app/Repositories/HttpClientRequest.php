<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class HttpClientRequest
{

	protected $baseUri;

	public function __construct()
	{

		$this->baseUri = config('app.base_uri');

	}

	/**
	 * Send Get Request using Http Client
	 *
	 * @param $url
	 *
	 * @return mixed
	 */
	public function get($url)
	{
		$response = Http::get($this->baseUri . '/' . $url);
		return json_decode($response->getBody()->getContents());

	}

	public function post($url,$data)
	{
		$response = Http::post($this->baseUri . '/' . $url,[
			'id' => $data['ID'],
			'title' => $data['titulo'],
			'description' => $data['descripcion'],
			'date' => $data['fecha'],
			'liga' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function post_c($url,$data)
	{
		$response = Http::post($this->baseUri . '/' . $url,[
			'id' => $data['ID'],
			'title' => $data['titulo'],
			'description' => $data['descripcion'],
			'date' => $data['fecha'],
			'link' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function post_h($url,$data)
	{
		$response = Http::post($this->baseUri . '/' . $url,[
			'id' => $data['ID'],
			'title' => $data['titulo'],
			'description' => $data['descripcion'],
			'image' => $data['link_imagen'],
			'link' => $data['link_pagina']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function post_m($url,$data)
	{
		$response = Http::post($this->baseUri . '/' . $url,[
			'id' => $data['ID'],
			'title' => $data['titulo'],
			'url' => $data['link_imagen']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function post_t($url,$data)
	{
		$response = Http::post($this->baseUri . '/' . $url,[
			'id' => $data['ID'],
			'id_material' => $data['ID_material'],
			'title' => $data['titulo'],
			'url_notes' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function post_v($url,$data)
	{
		$response = Http::post($this->baseUri . '/' . $url,[
			'id' => $data['ID'],
			'id_material' => $data['ID_material'],
			'title' => $data['titulo'],
			'code' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'title' => $data['titulo'],
			'description' => $data['descripcion'],
			'date' => $data['fecha'],
			'liga' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put_c($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'title' => $data['titulo'],
			'description' => $data['descripcion'],
			'date' => $data['fecha'],
			'link' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put_h($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'title' => $data['titulo'],
			'description' => $data['descripcion'],
			'image' => $data['link_imagen'],
			'link' => $data['link_pagina']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put_m($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'title' => $data['titulo'],
			'url' => $data['link_imagen']
		]);
		dd($response);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put_t($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'id_material' => $data['ID_material'],
			'title' => $data['titulo'],
			'url_notes' => $data['link_notas']
		]);
		// dd($response);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put_v($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'id_material' => $data['ID_material'],
			'title' => $data['titulo'],
			'code' => $data['codigo']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put_a($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'url_consultancies' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function put_con($url,$data,$id)
	{
		$response = Http::put($this->baseUri . '/' . $url,[
			'id' => $id,
			'url_announcement' => $data['link']
		]);
		//Se puede regresar el mensaje de exito 
		//return json_decode($response->getBody()->getContents());
	}

	public function delete($url)
	{
		$response = Http::delete($this->baseUri . '/' . $url);
	}

}