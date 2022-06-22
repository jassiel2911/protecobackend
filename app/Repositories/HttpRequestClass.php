<?php

namespace App\Repositories;

class HttpRequestClass
{

	/**
	 * @var GuzzleHttpRequest
	 * @var HttpClientRequest
	 *
	 */
	private $client;

	public function __construct()
	{

		$httpClient = config('app.http_client');
		if ($httpClient == 'GuzzleHttp') {
			$this->client = new GuzzleHttpRequest();
		} else {
			$this->client = new HttpClientRequest();
		}

	}

	/**
	 * Send Get Request
	 *
	 * @param $url
	 *
	 * @return mixed
	 */
	public function get($url)
	{

		$response = $this->client->get($url);

		return $response;

	}

	/**
	 * Send Post Request
	 *
	 * @param $url
	 * @param $data
	 */
	public function post($url, $data)
	{
		$response = $this->client->post($url,$data);
		return $response;
	}

	public function post_c($url, $data)
	{
		$response = $this->client->post_c($url,$data);
		return $response;
	}

	public function post_h($url, $data)
	{
		$response = $this->client->post_h($url,$data);
		return $response;
	}

	public function post_m($url, $data)
	{
		$response = $this->client->post_m($url,$data);
		return $response;
	}

	public function post_t($url, $data)
	{
		$response = $this->client->post_t($url,$data);
		return $response;
	}

	public function post_v($url, $data)
	{
		$response = $this->client->post_v($url,$data);
		return $response;
	}

	public function put($url, $data,$id)
	{
		$response = $this->client->put($url,$data,$id);
		return $response;
	}

	public function put_c($url, $data,$id)
	{
		$response = $this->client->put_c($url,$data,$id);
		return $response;
	}

	public function put_h($url, $data,$id)
	{
		$response = $this->client->put_h($url,$data,$id);
		return $response;
	}

	public function put_m($url, $data,$id)
	{
		$response = $this->client->put_m($url,$data,$id);
		return $response;
	}

	public function put_t($url, $data,$id)
	{
		$response = $this->client->put_t($url,$data,$id);
		return $response;
	}

	public function put_v($url, $data,$id)
	{
		$response = $this->client->put_v($url,$data,$id);
		return $response;
	}

	public function put_a($url, $data,$id)
	{
		$response = $this->client->put_a($url,$data,$id);
		return $response;
	}

	public function put_con($url, $data,$id)
	{
		$response = $this->client->put_con($url,$data,$id);
		return $response;
	}

	public function delete($url)
	{
		$response = $this->client->delete($url);
		return $response;
	}

}