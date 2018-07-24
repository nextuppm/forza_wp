<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;
	use GuzzleHttp\Psr7\Uri;

	class ClientRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/FinstarClientAPI/";

		/**
		 * @param string $clientId
		 * @return stdClass
		 */
		public function getById(string $clientId) : ?stdClass{
			if (!Utils::validateGUID($clientId)) {
				throw new InvalidArgumentException("Invalid client GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "clients/{$clientId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->ClientDetailsResult->ResponseObject;
		}


		/**
		 * @param array $params - array with keys: Firstname, Lastname, BirthDate,
		 *                      ClientTypeID, ClientOwnerID, [DocTypeID, DocSeries, DocNumber],
		 *                      [CommTypeID, CommValue]
		 * @return array
		 */
		public function search(array $params) : array {
			if(count($params) == 0){
				throw new InvalidArgumentException("Empty params of client search");
			}

			$uri = new Uri(self::CONST_PATH . "clients");
			$request = new Request(
				'GET',
				$uri->withQuery(GuzzleHttp\Psr7\build_query($params))
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->ClientListResult->ResponseObject;
		}


		/**
		 * @param array $params
		 * @return
		 */
		public function create(array $params){
			$json = $this->getApi()->encodeRequestBody(
				[
					"clientCreateRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => $params
					]
				]
			);
			$request = new Request('POST', self::CONST_PATH . "clients", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->ClientCreateResult->Code == "OK"){ // $responseData->ClientCreateResult->Id !== null
				return $responseData->ClientCreateResult->Id;
			}

			throw new ClientException($responseData->ClientCreateResult->Description, $request, $response);
		}


		/**
		 * @param stdClass $params - needs a full contact object, like received from ClientRepository->getById()
		 * @return bool
		 */
		public function update(stdClass $params) : bool{
			$json = $this->getApi()->encodeRequestBody(
				[
					"clientUpdateRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => $params
					]
				]
			);
			$request = new Request('PATCH', self::CONST_PATH . "clients/update", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->ClientUpdateResult->Code == "OK"){
				return true;
			}

			return false;
		}


	}