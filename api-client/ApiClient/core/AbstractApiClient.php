<?php

	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\ClientException;
	use Psr\Http\Message\RequestInterface;
	use Psr\Http\Message\ResponseInterface;

	abstract class AbstractApiClient {

		private $client;

		public abstract function auth(string $userName = null, string $userPassword = null) : bool;

		protected function getClient() : Client{
			return $this->client;
		}

		protected function initClient(array $config = []) : void{
			$this->client = new Client($config);
		}

		public function decodeBody(ResponseInterface $response){
			return json_decode($response->getBody()->getContents());
		}

		public function encodeRequestBody($arrayOrObject){
			return json_encode($arrayOrObject);
		}

		public function sendRequest(RequestInterface $request, array $options = []){
			$response = null;
			try{
				$response = $this->getClient()->send($request, $options);
			}
			catch(ClientException $ex){
				if($ex->getCode() == 401){
					$this->auth();
					$response = $this->getClient()->send($request, $options);
				}
				else{
					throw $ex;
				}
			}

			return $response;
		}

	}