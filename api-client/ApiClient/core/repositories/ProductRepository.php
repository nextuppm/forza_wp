<?php

	use GuzzleHttp\Psr7\Request;

	require_once 'AbstractRepository.php';

	class ProductRepository extends AbstractRepository{

		/**
		 * @param null $clientId
		 * @param null $url
		 * @return stdClass
		 */
		public function getOffers($clientId = null, $url = null) : ?stdClass {
			$json = $this->getApi()->encodeRequestBody(
				[
					"getRelatedOffersListRequest" => [
						"APIKey" => $this->getApi()->getApiKey(),
						"RequestObject" => [
							"ClientId" => $clientId,
							"URL" => $url
						]
					]
				]
			);

			$request = new Request('POST', "0/rest/FinstarOffersAPI/offers", [], $json);
			$response = $this->getApi()->sendRequest($request);

			$responseData = $this->getApi()->decodeBody($response);

			return $responseData->GetRelatedOffersListResult->ResponseObject;
		}

		/**
		 * @param string $productId
		 * @return array
		 */
		public function getProductBulk(string $productId) : array {
			if (!Utils::validateGUID($productId)) {
				throw new InvalidArgumentException("Invalid product GUID");
			}

			$request = new Request(
				'GET',
				"0/rest/FinstarProductAPI/products/{$productId}/recalculatedOffer"
			);
			$response = $this->getApi()->sendRequest($request);
			$responseData = $this->getApi()->decodeBody($response);

			return json_decode(base64_decode($responseData->RecalculatedOfferResult->ResponseObject));
		}

	}