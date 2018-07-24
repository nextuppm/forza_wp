<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;
	use GuzzleHttp\Psr7\Uri;

	class LoanRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/FinstarLoanAPI/";

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
				self::CONST_PATH . "loans/client/{$clientId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoansListResult->ResponseObject;
		}

		/**
		 * @param string $loanId
		 * @return stdClass
		 */
		public function getById(string $loanId) : stdClass{
			if (!Utils::validateGUID($loanId)) {
				throw new InvalidArgumentException("Invalid loan GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "loans/{$loanId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoanDetailsResult->ResponseObject;
		}


		/**
		 * @param stdClass $params - needs a full loan object, like received from LoanRepository->getById()
		 * @return bool
		 */
		public function update(stdClass $params) : bool{
			$json = $this->getApi()->encodeRequestBody(
				[
					"loanUpdateRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => $params
					]
				]
			);
			$request = new Request('PATCH', self::CONST_PATH . "loans/update", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			if($responseData->LoanUpdateResult->Code == "OK"){
				return true;
			}

			return false;
		}


	}