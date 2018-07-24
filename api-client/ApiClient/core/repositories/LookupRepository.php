<?php

	require_once 'AbstractRepository.php';

	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Psr7\Request;
	use GuzzleHttp\Psr7\Uri;

	class LookupRepository extends AbstractRepository{

		private const CONST_PATH = "0/rest/LookupsApi/";

		/**
		 * @param string $lookupName
		 * @param bool $localized
		 * @return array
		 */
		public function getDataFromLookup(string $lookupName, bool $localized = false) : array{
			if(empty($lookupName)){
				throw new InvalidArgumentException("Empty lookup name");
			}

			$params = ['LookupName' => $lookupName];
			$params['Localized'] = $localized ? 'true' : 'false';

			$uri = new Uri(self::CONST_PATH . "GetDataFromLookup");
			$request = new Request(
				'GET',
				$uri->withQuery(GuzzleHttp\Psr7\build_query($params))
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->GetDataFromLookupResult;
		}


		/**
		 * @param string $lookupName
		 * @param bool $localized
		 * @return array
		 */
		public function getLookupWithReference(string $lookupName, bool $localized = false) : array{
			if(empty($lookupName)){
				throw new InvalidArgumentException("Empty lookup name");
			}

			$params = ['LookupName' => $lookupName];
			$params['Localized'] = $localized ? 'true' : 'false';

			$uri = new Uri(self::CONST_PATH . "GetLookupObjectDataWithReference");
			$request = new Request(
				'GET',
				$uri->withQuery(GuzzleHttp\Psr7\build_query($params))
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->GetLookupObjectDataWithReferenceResult;
		}

	}