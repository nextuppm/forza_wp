<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;
	use GuzzleHttp\Psr7\Uri;

	class LoanApplicationRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/FinstarLoanApplicationAPI/";

		/**
		 * @param string $clientId
		 * @return array
		 */
		public function getListByClientId(string $clientId) : array{
			if (!Utils::validateGUID($clientId)) {
				throw new InvalidArgumentException("Invalid client GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "loan-applications/client/{$clientId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoanApplicationsListResult->ResponseObject;
		}

		/**
		 * @param string $applicationId
		 * @return stdClass
		 */
		public function getById(string $applicationId) : stdClass{
			if (!Utils::validateGUID($applicationId)) {
				throw new InvalidArgumentException("Invalid loan application GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "loan-applications/{$applicationId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoanApplicationDetailsResult->ResponseObject;
		}


		/**
		 * Sometimes returns error when take DisbursementAccountID param not null.
		 * @param array $params
		 * @return
		 */
		public function create(array $params){
			$json = $this->getApi()->encodeRequestBody(
				[
					"LoanApplicationCreateRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => $params
					]
				]
			);
			$request = new Request('POST', self::CONST_PATH . "loan-applications", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->LoanApplicationCreateResult->Code == "OK"){
				return $responseData->LoanApplicationCreateResult->Id;
			}

			throw new ClientException($responseData->LoanApplicationCreateResult->Description, $request, $response);
		}


		/**
		 * @param stdClass $params - needs a full loan application object, like received from LoanApplicationRepository->getById()
		 * @return bool
		 */
		public function update(stdClass $params) : bool{
			$json = $this->getApi()->encodeRequestBody(
				[
					"LoanApplicationUpdateRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => $params
					]
				]
			);
			$request = new Request('PATCH', self::CONST_PATH . "loan-applications/update", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->LoanApplicationUpdateResult->Code == "OK"){
				return true;
			}

			return false;
		}

		/**
		 * Set 'canceled' status to loan application by id.
		 * @param string $applicationId
		 * @return bool
		 */
		public function cancel(string $applicationId) : bool{
			if (!Utils::validateGUID($applicationId)) {
				throw new InvalidArgumentException("Invalid loan application GUID");
			}

			$request = new Request(
				'DELETE',
				self::CONST_PATH . "loan-applications/{$applicationId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->LoanApplicationDeleteResult->Code == "OK"){
				return true;
			}

			throw new ClientException($responseData->LoanApplicationDeleteResult->Description, $request, $response);
		}


		public function confirmSms(string $applicationId, string $code) : bool{
			$json = $this->getApi()->encodeRequestBody(
				[
					"confirmSmsData" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => [
							"ApplicationID" => $applicationId,
							"Code" => $code
						]
					]
				]
			);
			$request = new Request('POST', self::CONST_PATH . "loan-applications/ConfirmSms", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->ConfirmSmsResult->Code == "OK"){
				return true;
			}

			throw new ClientException($responseData->ConfirmSmsResult->Description, $request, $response);
		}
	}