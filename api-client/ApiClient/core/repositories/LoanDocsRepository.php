<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;

	class LoanDocsRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/FinstarLoanAPI/";

		/**
		 * @param string $loanId
		 * @return array
		 */
		public function getDocFiles(string $loanId) : array{
			if (!Utils::validateGUID($loanId)) {
				throw new InvalidArgumentException("Invalid loan GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "loans/{$loanId}/docs"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoanDocumentsListResult->ResponseObject;
		}


		/**
		 * @param string $fileId
		 * @return string - returns base64 encoded document
		 */
		public function getFileById(string $fileId) : string{
			if (!Utils::validateGUID($fileId)) {
				throw new InvalidArgumentException("Invalid loan doc file GUID");
			}

			$request = new Request(
				'GET',
				self::CONST_PATH . "loans/docs/{$fileId}"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->LoanDocumentContentResult->ResponseObject;
		}

	}