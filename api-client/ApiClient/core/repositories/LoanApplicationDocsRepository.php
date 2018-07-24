<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;

	class LoanApplicationDocsRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/FinstarLoanApplicationAPI/";

		/**
		 * @param string
		 * @return array
		 */
		public function getDocFiles(string $applicationId) : array{
			if (!Utils::validateGUID($applicationId)) {
				throw new InvalidArgumentException("Invalid loan application GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "loan-applications/{$applicationId}/docs"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoanApplicationDocumentsListResult->ResponseObject;
		}


		/**
		 * @param string $fileId
		 * @return string - returns base64 encoded document
		 */
		public function getFileById(string $fileId) : string{
			if (!Utils::validateGUID($fileId)) {
				throw new InvalidArgumentException("Invalid loan application doc file GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "loan-applications/docs/{$fileId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoanApplicationDocumentContentResult->ResponseObject;
		}

	}