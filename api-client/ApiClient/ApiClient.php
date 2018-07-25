<?php

	require 'vendor/autoload.php';
	require 'core/exceptions/AuthDataException.php';
	require 'core/AbstractApiClient.php';
	require 'core/repositories/ClientRepository.php';
	require 'core/repositories/ClientRegDocsRepository.php';
	require 'core/repositories/ProductRepository.php';
	require 'core/repositories/LoanApplicationRepository.php';
	require 'core/repositories/LoanApplicationDocsRepository.php';
	require 'core/repositories/LoanRepository.php';
	require 'core/repositories/LoanDocsRepository.php';
	require 'core/repositories/LookupRepository.php';
	require 'core/repositories/NotificationsRepository.php';
	require 'core/Utils.php';

	use GuzzleHttp\Psr7\Request;

	class ApiClient extends AbstractApiClient{

		private $apiKey = null;

		private $userName = "WebUser";
		private $userPassword = "~hT{=LakxOrOU3";

		private $clientRepository;
		private $clientRegDocsRepository;
		private $productRepository;
		private $loanApplicationRepository;
		private $loanApplicationDocsRepository;
		private $loanRepository;
		private $loanDocsRepository;
		private $lookupRepository;
		private $notificationsRepository;

		public function __construct(){
			//TODO load configs
			$this->initClient(
				[
					'base_uri' => 'http://159.122.88.110:82',
					'headers' => ['Content-Type' => 'application/json'],
					'cookies' => true,
					'timeout' => 10,
					'verify' => false
				]
			);

			$this->initRepositories();
		}

		private function initRepositories(){
			$this->clientRepository = new ClientRepository($this);
			$this->clientRegDocsRepository = new ClientRegDocsRepository($this);
			$this->productRepository = new ProductRepository($this);
			$this->loanApplicationRepository = new LoanApplicationRepository($this);
			$this->loanApplicationDocsRepository = new LoanApplicationDocsRepository($this);
			$this->loanRepository = new LoanRepository($this);
			$this->loanDocsRepository = new LoanDocsRepository($this);
			$this->lookupRepository = new LookupRepository($this);
			$this->notificationsRepository = new NotificationsRepository($this);
		}

		public function auth(string $userName = null, string $userPassword = null) : bool{
			$request = new Request(
				'POST',
				"ServiceModel/AuthService.svc/Login",
				[],
				$this->encodeRequestBody(
					[
						"UserName" => $userName === null ? $this->userName : $userName,
						"UserPassword" => $userPassword === null ? $this->userPassword : $userPassword
					]
				)
			);
			$response = $this->getClient()->send($request);
			$responseData = $this->decodeBody($response);
			if($responseData->Code === 1){
				throw new AuthDataException($responseData->Message, $request, $response);
			}

			return true;
		}

		public function getClientRepository() : ClientRepository{
			return $this->clientRepository;
		}

		public function getClientRegDocsRepository() : ClientRegDocsRepository{
			return $this->clientRegDocsRepository;
		}

		public function getProductRepository() : ProductRepository{
			return $this->productRepository;
		}

		public function getLoanApplicationRepository() : LoanApplicationRepository{
			return $this->loanApplicationRepository;
		}

		public function getLoanApplicationDocsRepository() : LoanApplicationDocsRepository{
			return $this->loanApplicationDocsRepository;
		}

		public function getLoanRepository() : LoanRepository{
			return $this->loanRepository;
		}

		public function getLoanDocsRepository() : LoanDocsRepository{
			return $this->loanDocsRepository;
		}

		public function getLookupRepository() : LookupRepository{
			return $this->lookupRepository;
		}

		public function getNotificationsRepository() : NotificationsRepository{
			return $this->notificationsRepository;
		}

		public function getApiKey(){
			return $this->apiKey;
		}

	}