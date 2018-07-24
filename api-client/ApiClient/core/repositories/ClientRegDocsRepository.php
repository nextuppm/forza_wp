<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;

	class ClientRegDocsRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/FinstarClientAPI/";

		/**
		 * @param string $regDocId - contact->RegDocuments[0]->DocID
		 * @return array
		 */
		public function getRegDocFiles(string $regDocId) : array{
			if (!Utils::validateGUID($regDocId)) {
				throw new InvalidArgumentException("Invalid regDocId GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "clients/{$regDocId}/docs"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->ClientDocumentsListResult->ResponseObject;
		}


		/**
		 * @param string $fileId
		 * @return string - returns base64 encoded document
		 */
		public function getFileById(string $fileId) : string{
			if (!Utils::validateGUID($fileId)) {
				throw new InvalidArgumentException("Invalid reg doc file GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "clients/docs/{$fileId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->ClientDocumentContentResult->ResponseObject;
		}


		/**
		 * @param $regDocId
		 * @param $fileName
		 * @param $fileContent - not base64 encoded
		 * @param null $fileType
		 * @param null $fileOwner
		 * @return
		 */
		public function createRegDocFile(string $regDocId, string $fileName, $fileContent, $fileType = null, $fileOwner = null){
			$json = $this->getApi()->encodeRequestBody(
				[
					"clientDocumentCreateRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => [
							"FileDate" => Utils::getCurrentDate(),
							"FileID" => null,
							"FileName" => $fileName,
							"FileOwner" => $fileOwner,
							"FileSize" => strlen($fileContent), //need size of file or his base64?
							"FileType" => $fileType,
							"FileContent" => base64_encode($fileContent)
						]
					]
				]
			);
			$request = new Request('PUT', self::CONST_PATH . "clients/{$regDocId}/docs", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->ClientDocumentCreateResult->Code == "OK"){ // $responseData->ClientDocumentCreateResult->Id !== null
				return $responseData->ClientDocumentCreateResult->Id;
			}

			throw new ClientException($responseData->ClientDocumentCreateResult->Description, $request, $response);
		}

	}